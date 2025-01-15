<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PeminjamanModel;
use App\Models\Admin\DataBukuModels;
use App\Models\UserModel;
use App\Models\Admin\NamaKategoriModels;

class DashboardController extends BaseController
{
    protected $peminjamanModel;
    protected $bukuModel;
    protected $userModel;
    protected $kategoriModel;

    public function __construct()
    {
        $this->peminjamanModel = new PeminjamanModel();
        $this->bukuModel = new DataBukuModels();
        $this->userModel = new UserModel();
        $this->kategoriModel = new NamaKategoriModels();
      }

    public function index()
    {
        // Data untuk cards
        $data['totalBuku'] = $this->bukuModel->countAllResults();
        $data['totalUser'] = $this->userModel->countAllResults();
        $data['totalKategori'] = $this->kategoriModel->countAllResults();
        $data['totalPeminjaman'] = $this->peminjamanModel->countAllResults();

        // Data peminjaman untuk tabel - dimodifikasi untuk menampilkan peminjam unik dengan buku yang dipinjam
        $data['peminjaman'] = $this->peminjamanModel
            ->select('user.UserID, user.NamaLengkap, user.Username, 
                     GROUP_CONCAT(DISTINCT peminjaman.PeminjamanID) as PeminjamanIDs,
                     GROUP_CONCAT(DISTINCT buku.Judul SEPARATOR "||") as Judul,
                     MIN(peminjaman.TanggalPeminjaman) as TanggalPeminjaman,
                     MAX(peminjaman.TanggalPengembalian) as TanggalPengembalian,
                     GROUP_CONCAT(DISTINCT peminjaman.StatusPeminjaman) as StatusPeminjaman')
            ->join('user', 'user.UserID = peminjaman.UserID')
            ->join('buku', 'buku.BukuID = peminjaman.BukuID')
            ->groupBy('user.UserID, user.NamaLengkap, user.Username')
            ->orderBy('peminjaman.TanggalPeminjaman', 'DESC')
            ->findAll();

        // Memproses data untuk memisahkan buku yang digabung
        foreach ($data['peminjaman'] as &$pinjam) {
            $pinjam['Buku'] = explode('||', $pinjam['Judul']);
            $pinjam['PeminjamanID'] = explode(',', $pinjam['PeminjamanIDs'])[0]; // Mengambil ID pertama untuk detail
        }

        // Data untuk grafik
        $data['peminjamanPerBulan'] = $this->getPeminjamanPerBulan();
        $data['kategoriTerpopuler'] = $this->getKategoriTerpopuler();

        return view('Admin/Dashboard', $data);
    }

    private function getPeminjamanPerBulan()
    {
        return $this->peminjamanModel
            ->select('MONTH(TanggalPeminjaman) as bulan, COUNT(*) as total')
            ->groupBy('MONTH(TanggalPeminjaman)')
            ->orderBy('bulan', 'ASC')
            ->findAll();
    }

    private function getKategoriTerpopuler()
    {
        return $this->peminjamanModel
            ->select('kategoribuku.NamaKategori as kategori, COUNT(*) as total')
            ->join('buku', 'buku.BukuID = peminjaman.BukuID')
            ->join('kategoribuku_relasi', 'kategoribuku_relasi.BukuID = buku.BukuID')
            ->join('kategoribuku', 'kategoribuku.KategoriID = kategoribuku_relasi.KategoriID')
            ->groupBy('kategoribuku.KategoriID, kategoribuku.NamaKategori')
            ->orderBy('total', 'DESC')
            ->limit(5)
            ->findAll();
    }

    public function getDetail($id)
    {
        try {
            // Dapatkan data peminjaman berdasarkan UserID
            $peminjaman = $this->peminjamanModel
                ->select('
                    peminjaman.*,
                    user.NamaLengkap,
                    user.Username,
                    user.Email,
                    user.Kelas,
                    buku.Judul,
                    buku.Penulis,
                    buku.Penerbit,
                    buku.TahunTerbit
                ')
                ->join('user', 'user.UserID = peminjaman.UserID')
                ->join('buku', 'buku.BukuID = peminjaman.BukuID')
                ->where('user.UserID', $id)
                ->findAll();

            if (empty($peminjaman)) {
                throw new \Exception('Data peminjaman tidak ditemukan');
            }

            // Siapkan data peminjam (ambil dari record pertama karena data user sama)
            $peminjam = [
                'NamaLengkap' => $peminjaman[0]['NamaLengkap'],
                'Username' => $peminjaman[0]['Username'],
                'Email' => $peminjaman[0]['Email'],
                'Kelas' => $peminjaman[0]['Kelas']
            ];

            // Siapkan data buku yang dipinjam
            $bukuDipinjam = array_map(function($item) {
                return [
                    'Judul' => $item['Judul'],
                    'Penulis' => $item['Penulis'],
                    'Penerbit' => $item['Penerbit'],
                    'TahunTerbit' => $item['TahunTerbit'],
                    'TanggalPeminjaman' => $item['TanggalPeminjaman'],
                    'TanggalPengembalian' => $item['TanggalPengembalian'],
                    'StatusPeminjaman' => $item['StatusPeminjaman']
                ];
            }, $peminjaman);

            return $this->response->setJSON([
                'status' => 'success',
                'peminjam' => $peminjam,
                'buku' => $bukuDipinjam
            ]);

        } catch (\Exception $e) {
            log_message('error', 'Error in getDetail: ' . $e->getMessage());
            return $this->response->setJSON([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        }
    }

    private function getKategoriName($kategoriID)
    {
        $kategori = $this->kategoriModel->find($kategoriID);
        return $kategori ? $kategori['NamaKategori'] : 'Tidak ada kategori';
    }
}
