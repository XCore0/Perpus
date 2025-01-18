<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PeminjamanModel;
use App\Models\Admin\DataBukuModels;
use App\Models\UserModel;
use DateTime;

class PeminjamanPengembalianController extends BaseController
{
    protected $peminjamanModel;
    protected $bukuModel;
    protected $userModel;
    protected $db;

    public function __construct()
    {
        $this->peminjamanModel = new PeminjamanModel();
        $this->bukuModel = new DataBukuModels();
        $this->userModel = new UserModel();
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        $data['peminjaman'] = $this->peminjamanModel->getPeminjamanWithDetails();
        return view('Admin/PeminjamanPengembalian', $data);
    }

    public function create()
    {
        $data = [
            'NamaPeminjam' => $this->request->getPost('nama_peminjam'),
            'BukuID' => $this->request->getPost('buku_id'),
            'TanggalPinjam' => $this->request->getPost('tanggal_pinjam'),
            'TanggalKembali' => $this->request->getPost('tanggal_kembali'),
            'Status' => 'Dipinjam'
        ];

        // Update stok buku
        $buku = $this->bukuModel->find($data['BukuID']);
        if ($buku['Stok'] > 0) {
            $this->bukuModel->update($data['BukuID'], ['Stok' => $buku['Stok'] - 1]);

            if ($this->peminjamanModel->insert($data)) {
                return redirect()->to(base_url('admin/peminjaman'))->with('success', 'Peminjaman berhasil ditambahkan');
            }
        }

        return redirect()->back()->with('error', 'Stok buku tidak mencukupi');
    }

    public function updateStatus($userId)
    {
        try {
            $status = $this->request->getPost('status');

            // Ambil semua peminjaman untuk user ini
            $peminjaman = $this->peminjamanModel->getPeminjamanByUserId($userId);

            if (empty($peminjaman)) {
                return redirect()->back()->with('error', 'Data peminjaman tidak ditemukan');
            }

            $success = true;
            $db = \Config\Database::connect();
            $db->transStart(); // Mulai transaksi

            foreach ($peminjaman as $pinjam) {
                // Skip jika status sama
                if ($pinjam['StatusPeminjaman'] === $status) {
                    continue;
                }

                // Update stok buku
                if ($status === 'Dikembalikan' && $pinjam['StatusPeminjaman'] !== 'Dikembalikan') {
                    // Tambah stok saat dikembalikan
                    $buku = $this->bukuModel->find($pinjam['BukuID']);
                    if ($buku) {
                        $this->bukuModel->update($pinjam['BukuID'], [
                            'Stok' => $buku['Stok'] + 1
                        ]);
                    }
                } else if ($pinjam['StatusPeminjaman'] === 'Dikembalikan' && $status !== 'Dikembalikan') {
                    // Kurangi stok saat status berubah dari dikembalikan
                    $buku = $this->bukuModel->find($pinjam['BukuID']);
                    if ($buku && $buku['Stok'] > 0) {
                        $this->bukuModel->update($pinjam['BukuID'], [
                            'Stok' => $buku['Stok'] - 1
                        ]);
                    } else {
                        $success = false;
                        log_message('error', 'Stok tidak mencukupi untuk buku ID: ' . $pinjam['BukuID']);
                        continue;
                    }
                }

                // Update status peminjaman
                $updated = $this->peminjamanModel->update($pinjam['PeminjamanID'], [
                    'StatusPeminjaman' => $status,
                    'updated_at' => date('Y-m-d H:i:s')
                ]);

                if (!$updated) {
                    $success = false;
                    log_message('error', 'Gagal update peminjaman ID: ' . $pinjam['PeminjamanID']);
                }
            }

            $db->transComplete(); // Selesai transaksi

            if ($db->transStatus() === false) {
                return redirect()->back()->with('error', 'Terjadi kesalahan saat memperbarui status');
            }

            if ($success) {
                return redirect()->back()->with('success', 'Status semua peminjaman berhasil diperbarui');
            } else {
                return redirect()->back()->with('error', 'Beberapa peminjaman gagal diperbarui');
            }
        } catch (\Exception $e) {
            log_message('error', 'Error updating peminjaman status: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memperbarui status');
        }
    }

    public function delete($id)
    {
        $peminjaman = $this->peminjamanModel->find($id);

        // Jika status masih Dipinjam, kembalikan stok buku
        if ($peminjaman['Status'] === 'Dipinjam') {
            $buku = $this->bukuModel->find($peminjaman['BukuID']);
            $this->bukuModel->update($peminjaman['BukuID'], ['Stok' => $buku['Stok'] + 1]);
        }

        if ($this->peminjamanModel->delete($id)) {
            return redirect()->back()->with('success', 'Data peminjaman berhasil dihapus');
        }

        return redirect()->back()->with('error', 'Gagal menghapus data peminjaman');
    }

    // Helper method untuk mengecek keterlambatan
    private function checkKeterlambatan()
    {
        $peminjaman = $this->peminjamanModel->where('Status', 'Dipinjam')->findAll();
        $today = date('Y-m-d');

        foreach ($peminjaman as $pinjam) {
            if ($today > $pinjam['TanggalKembali']) {
                $this->peminjamanModel->update($pinjam['PeminjamanID'], ['Status' => 'Terlambat']);
            }
        }
    }

    private function updateLateStatus()
    {
        $peminjamanModel = new \App\Models\PeminjamanModel();
        $today = date('Y-m-d');

        // Ambil semua peminjaman yang belum dikembalikan dan melewati tanggal pengembalian
        $latePeminjaman = $peminjamanModel->where('StatusPeminjaman', 'Dipinjam')
            ->where('TanggalPengembalian <', $today)
            ->findAll();

        // Update status menjadi terlambat
        foreach ($latePeminjaman as $pinjam) {
            $peminjamanModel->update($pinjam['PeminjamanID'], [
                'StatusPeminjaman' => 'Terlambat',
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }
    }

    // Tambahkan method baru untuk menghitung denda
    public function hitungDenda($userId)
    {
        $peminjaman = $this->peminjamanModel->getPeminjamanByUserId($userId);
        $today = new DateTime();
        $denda = 0;
        $isLate = false;
        $latestDueDate = null;

        foreach ($peminjaman as $pinjam) {
            if ($pinjam['StatusPeminjaman'] === 'Terlambat') {
                $dueDate = new DateTime($pinjam['TanggalPengembalian']);
                if (!$latestDueDate || $dueDate > $latestDueDate) {
                    $latestDueDate = $dueDate;
                }
                $isLate = true;
            }
        }

        // Hitung denda jika terlambat
        if ($isLate && $latestDueDate) {
            $interval = $today->diff($latestDueDate);
            $daysDiff = $interval->days;
            $denda = $daysDiff * 10000; // Rp 10.000 per hari
        }

        return [
            'denda' => $denda,
            'hari_terlambat' => $daysDiff ?? 0,
            'tanggal_jatuh_tempo' => $latestDueDate ? $latestDueDate->format('Y-m-d') : null
        ];
    }

    public function printPDF()
    {
        // Increase PHP execution time limit
        set_time_limit(300);
        ini_set('memory_limit', '512M');

        $db = \Config\Database::connect();
        $builder = $db->table('peminjaman p')
            ->select('p.*, u.NamaLengkap, u.Email, b.Judul, b.Penulis')
            ->join('user u', 'u.UserID = p.UserID')
            ->join('buku b', 'b.BukuID = p.BukuID');

        // Get filter parameters
        $filterType = $this->request->getGet('filter_type');
        $status = $this->request->getGet('status');
        $search = $this->request->getGet('search');

        // Apply filters based on filter type
        if ($filterType) {
            switch($filterType) {
                case 'predefined':
                    $period = $this->request->getGet('period');
                    if ($period) {
                        $date = date('Y-m-d', strtotime("-$period days"));
                        $builder->where('p.TanggalPeminjaman >=', $date);
                    }
                    break;

                case 'custom':
                    $startDate = $this->request->getGet('start_date');
                    $endDate = $this->request->getGet('end_date');
                    if ($startDate && $endDate) {
                        $builder->where('DATE(p.TanggalPeminjaman) >=', $startDate)
                               ->where('DATE(p.TanggalPeminjaman) <=', $endDate);
                    }
                    break;

                case 'monthly':
                    $month = $this->request->getGet('month');
                    $year = $this->request->getGet('year');
                    if ($month && $year) {
                        $builder->where('MONTH(p.TanggalPeminjaman)', $month)
                               ->where('YEAR(p.TanggalPeminjaman)', $year);
                    }
                    break;

                case 'yearly':
                    $year = $this->request->getGet('year');
                    if ($year) {
                        $builder->where('YEAR(p.TanggalPeminjaman)', $year);
                    }
                    break;
            }
        }

        // Apply status filter
        if (!empty($status)) {
            $builder->where('p.StatusPeminjaman', $status);
        }

        // Apply search filter
        if (!empty($search)) {
            $builder->groupStart()
                    ->like('u.NamaLengkap', $search)
                    ->orLike('b.Judul', $search)
                    ->groupEnd();
        }

        // Get filter info for display
        $filterInfo = '';
        if ($filterType) {
            switch($filterType) {
                case 'predefined':
                    $period = $this->request->getGet('period');
                    $filterInfo = "$period hari terakhir";
                    break;
                case 'custom':
                    $startDate = date('d/m/Y', strtotime($this->request->getGet('start_date')));
                    $endDate = date('d/m/Y', strtotime($this->request->getGet('end_date')));
                    $filterInfo = "Periode $startDate - $endDate";
                    break;
                case 'monthly':
                    $month = $this->request->getGet('month');
                    $year = $this->request->getGet('year');
                    $monthName = date('F', mktime(0, 0, 0, $month, 1));
                    $filterInfo = "Bulan $monthName $year";
                    break;
                case 'yearly':
                    $year = $this->request->getGet('year');
                    $filterInfo = "Tahun $year";
                    break;
            }
        } else {
            $filterInfo = "Semua Data";
        }

        if (!empty($status)) {
            $filterInfo .= " (Status: $status)";
        }

        // Execute query
        $peminjaman = $builder->get()->getResultArray();

        // Get absolute path for logo
        $logoPath = FCPATH . 'dist/images/logo.svg';
        $logoData = '';
        
        // Convert logo to base64
        if (file_exists($logoPath)) {
            $logoType = pathinfo($logoPath, PATHINFO_EXTENSION);
            $logoData = file_get_contents($logoPath);
            $logoBase64 = 'data:image/' . $logoType . ';base64,' . base64_encode($logoData);
        } else {
            $logoBase64 = ''; // Set empty if logo not found
        }

        // Prepare data for PDF
        $data = [
            'peminjaman' => $peminjaman,
            'filter_info' => $filterInfo,
            'tanggal_cetak' => date('d/m/Y H:i:s'),
            'logo' => $logoBase64 // Pass the base64 encoded logo
        ];

        // Configure Dompdf with optimized settings
        $options = new \Dompdf\Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);
        $options->set('defaultFont', 'sans-serif');
        $options->set('isFontSubsettingEnabled', true);
        $options->set('defaultMediaType', 'print');
        $options->set('chroot', FCPATH); // Set root path for images
        
        // Load Dompdf
        $dompdf = new \Dompdf\Dompdf($options);
        
        // Load view
        $html = view('Admin/pdf/peminjaman_pdf', $data);
        
        // Load HTML to Dompdf
        $dompdf->loadHtml($html);
        
        // Set paper
        $dompdf->setPaper('A4', 'portrait');
        
        // Render
        $dompdf->render();
        
        // Stream
        return $dompdf->stream('laporan_peminjaman_' . date('Y-m-d') . '.pdf', [
            'Attachment' => false
        ]);
    }
}
