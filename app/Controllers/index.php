<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class index extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();
        
        // Inisialisasi session cart jika belum ada
        if (!session()->has('cart')) {
            session()->set('cart', []);
        }
        
        // Ambil data buku dengan kategorinya
        $builder = $db->table('buku');
        $builder->select('buku.*, kategoribuku.NamaKategori');
        $builder->join('kategoribuku_relasi', 'buku.BukuID = kategoribuku_relasi.BukuID', 'left');
        $builder->join('kategoribuku', 'kategoribuku_relasi.KategoriID = kategoribuku.KategoriID', 'left');
        $books = $builder->get()->getResultArray();

        // Ambil data kategori untuk sidebar
        $kategoriBuilder = $db->table('kategoribuku');
        $categories = $kategoriBuilder->get()->getResultArray();

        // Hitung jumlah buku per kategori
        $bookCountByCategory = [];
        foreach ($categories as $category) {
            $countBuilder = $db->table('kategoribuku_relasi');
            $countBuilder->where('KategoriID', $category['KategoriID']);
            $bookCountByCategory[$category['KategoriID']] = $countBuilder->countAllResults();
        }

        // Ambil data cart dari session
        $cart = session()->get('cart') ?? [];

        $data = [
            'books' => $books,
            'categories' => $categories,
            'bookCountByCategory' => $bookCountByCategory,
            'totalBooks' => count($books),
            'cart' => $cart,
            'cartCount' => count($cart),
            'baseURL' => base_url()
        ];

        return view('User/index', $data);
    }

    public function getBookDetail($id)
    {
        try {
            $db = \Config\Database::connect();
            $builder = $db->table('buku');
            $builder->select('buku.*, kategoribuku.NamaKategori');
            $builder->join('kategoribuku_relasi', 'buku.BukuID = kategoribuku_relasi.BukuID', 'left');
            $builder->join('kategoribuku', 'kategoribuku_relasi.KategoriID = kategoribuku.KategoriID', 'left');
            $builder->where('buku.BukuID', $id);
            
            $book = $builder->get()->getRowArray();

            if ($book) {
                return $this->response->setJSON([
                    'success' => true,
                    'book' => $book
                ]);
            }

            return $this->response->setJSON([
                'success' => false,
                'message' => 'Buku tidak ditemukan'
            ]);
        } catch (\Exception $e) {
            log_message('error', $e->getMessage());
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Terjadi kesalahan saat memuat detail buku',
                'error' => $e->getMessage()
            ]);
        }
    }

    public function submitReview()
    {
        if (!$this->request->isAJAX()) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Invalid request'
            ]);
        }

        // Validasi login
        if (!session()->get('isLoggedIn')) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Silakan login terlebih dahulu'
            ]);
        }

        // Ambil data dari POST
        $bukuId = $this->request->getPost('bukuId');
        $rating = $this->request->getPost('rating');
        $ulasan = $this->request->getPost('ulasan');
        $userId = session()->get('userID');

        // Validasi input
        if (!$bukuId || !$rating || !$ulasan) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Semua field harus diisi'
            ]);
        }

        try {
            $db = \Config\Database::connect();
            
            // Cek apakah user sudah pernah review buku ini
            $existingReview = $db->table('ulasanbuku')
                ->where('UserID', $userId)
                ->where('BukuID', $bukuId)
                ->get()
                ->getRow();

            if ($existingReview) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Anda sudah memberikan ulasan untuk buku ini'
                ]);
            }

            // Insert review baru
            $result = $db->table('ulasanbuku')->insert([
                'UserID' => $userId,
                'BukuID' => $bukuId,
                'Rating' => $rating,
                'Ulasan' => $ulasan,
            ]);

            if ($result) {
                return $this->response->setJSON([
                    'success' => true,
                    'message' => 'Ulasan berhasil ditambahkan'
                ]);
            } else {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Gagal menambahkan ulasan'
                ]);
            }
        } catch (\Exception $e) {
            log_message('error', $e->getMessage());
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Terjadi kesalahan saat menyimpan ulasan'
            ]);
        }
    }

    public function getBookReviews($bukuId)
    {
        try {
            $db = \Config\Database::connect();
            
            // Ambil ulasan dengan data user
            $reviews = $db->table('ulasanbuku')
                ->select('ulasanbuku.*, user.NamaLengkap')
                ->join('user', 'user.UserID = ulasanbuku.UserID')
                ->where('ulasanbuku.BukuID', $bukuId)
                ->orderBy('ulasanbuku.UlasanID', 'DESC')
                ->get()
                ->getResultArray();

            return $this->response->setJSON([
                'success' => true,
                'reviews' => $reviews
            ]);

        } catch (\Exception $e) {
            log_message('error', $e->getMessage());
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Terjadi kesalahan saat memuat ulasan'
            ]);
        }
    }
}