<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class Book extends ResourceController
{
    public function detail($id)
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
            log_message('error', 'Error fetching book details: ' . $e->getMessage());
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Terjadi kesalahan saat memuat detail buku'
            ]);
        }
    }

    public function review()
    {
        if (!$this->request->isAJAX()) {
            return redirect()->to('/');
        }

        $data = json_decode($this->request->getBody());
        
        try {
            $db = \Config\Database::connect();
            
            $reviewData = [
                'BukuID' => $data->bookId,
                'UserID' => session()->get('userID'),
                'Rating' => $data->rating,
                'Review' => $data->review,
                'created_at' => date('Y-m-d H:i:s')
            ];
            
            $db->table('ulasanbuku')->insert($reviewData);
            
            return $this->response->setJSON([
                'success' => true,
                'message' => 'Ulasan berhasil ditambahkan'
            ]);
            
        } catch (\Exception $e) {
            log_message('error', 'Error adding review: ' . $e->getMessage());
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Gagal menambahkan ulasan'
            ]);
        }
    }

    public function reviews($bookId)
    {
        if (!$this->request->isAJAX()) {
            return redirect()->to('/');
        }
        
        try {
            $db = \Config\Database::connect();
            
            $reviews = $db->table('ulasanbuku')
                ->select('ulasanbuku.*, users.namaLengkap')
                ->join('users', 'users.UserID = ulasanbuku.UserID')
                ->where('BukuID', $bookId)
                ->orderBy('created_at', 'DESC')
                ->get()
                ->getResultArray();
                
            return $this->response->setJSON([
                'success' => true,
                'reviews' => $reviews
            ]);
            
        } catch (\Exception $e) {
            log_message('error', 'Error fetching reviews: ' . $e->getMessage());
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Gagal memuat ulasan'
            ]);
        }
    }
}
