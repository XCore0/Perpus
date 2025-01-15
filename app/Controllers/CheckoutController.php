<?php

namespace App\Controllers;

use CodeIgniter\I18n\Time;

class CheckoutController extends BaseController
{
    public function index()
    {
        // Cek login
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('Auth/Login');
        }

        // Cek status peminjaman aktif
        $db = \Config\Database::connect();
        $activeLoan = $db->table('peminjaman')
            ->where('UserID', session()->get('userID'))
            ->where('StatusPeminjaman', 'Dipinjam')
            ->get()
            ->getResult();

        if (!empty($activeLoan)) {
            return redirect()->to('/')->with('error', 'Anda masih memiliki peminjaman aktif. Harap kembalikan buku terlebih dahulu.');
        }

        // Ambil data cart
        $cart = session()->get('cart') ?? [];
        if (empty($cart)) {
            return redirect()->to('/')->with('error', 'Keranjang kosong');
        }

        // Ambil detail buku untuk setiap item di cart
        $bukuIDs = array_column($cart, 'bukuId');
        $bukuDetails = $db->table('buku')
            ->select('buku.*, kategoribuku.NamaKategori')
            ->join('kategoribuku_relasi', 'kategoribuku_relasi.BukuID = buku.BukuID', 'left')
            ->join('kategoribuku', 'kategoribuku.KategoriID = kategoribuku_relasi.KategoriID', 'left')
            ->whereIn('buku.BukuID', $bukuIDs)
            ->get()
            ->getResultArray();

        // Format data untuk view
        $cartItems = [];
        foreach ($bukuDetails as $buku) {
            $cartItems[] = [
                'bukuId' => $buku['BukuID'],
                'judul' => $buku['Judul'],
                'kategori' => $buku['NamaKategori'] ?? 'Tanpa Kategori',
                'foto' => !empty($buku['Foto']) ? base_url('uploads/buku/' . $buku['Foto']) : base_url('dist/images/default-book.jpg')
            ];
        }

        $data = [
            'cart' => $cartItems
        ];

        return view('User/Checkout', $data);
    }

    public function process()
    {
        if (!$this->request->isAJAX()) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Invalid request'
            ]);
        }

        // Validasi input
        $rules = [
            'tanggalPeminjaman' => 'required|valid_date',
            'tanggalPengembalian' => 'required|valid_date'
        ];

        if (!$this->validate($rules)) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Tanggal tidak valid'
            ]);
        }

        $tanggalPeminjaman = $this->request->getPost('tanggalPeminjaman');
        $tanggalPengembalian = $this->request->getPost('tanggalPengembalian');
        $userID = session()->get('userID');

        // Ambil data cart
        $cart = session()->get('cart') ?? [];
        if (empty($cart)) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Keranjang kosong'
            ]);
        }

        $db = \Config\Database::connect();
        $db->transStart();

        try {
            // Cek stok buku sebelum memproses
            foreach ($cart as $item) {
                $buku = $db->table('buku')
                          ->where('BukuID', $item['bukuId'])
                          ->get()
                          ->getRowArray();
                
                if (!$buku || $buku['Stok'] < 1) {
                    throw new \Exception('Stok buku ' . ($buku['Judul'] ?? 'tidak tersedia') . ' tidak mencukupi');
                }
            }

            // Proses peminjaman
            foreach ($cart as $item) {
                // Insert ke tabel peminjaman
                $db->table('peminjaman')->insert([
                    'UserID' => $userID,
                    'BukuID' => $item['bukuId'],
                    'TanggalPeminjaman' => $tanggalPeminjaman,
                    'TanggalPengembalian' => $tanggalPengembalian,
                    'StatusPeminjaman' => 'Dipinjam'
                ]);

                // Update stok buku
                $db->table('buku')
                    ->where('BukuID', $item['bukuId'])
                    ->set('Stok', 'Stok - 1', false)
                    ->update();
            }

            $db->transComplete();

            if ($db->transStatus() === false) {
                throw new \Exception('Gagal memproses peminjaman');
            }

            // Kosongkan keranjang jika berhasil
            session()->remove('cart');

            return $this->response->setJSON([
                'success' => true,
                'message' => 'Peminjaman berhasil diproses'
            ]);

        } catch (\Exception $e) {
            $db->transRollback();
            return $this->response->setJSON([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }
} 