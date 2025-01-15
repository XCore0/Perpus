<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class KoleksiController extends ResourceController
{
    public function toggleKoleksi()
    {
        if (!$this->request->isAJAX()) {
            return $this->failUnauthorized('Invalid request');
        }

        if (!session()->get('isLoggedIn')) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Silakan login terlebih dahulu'
            ]);
        }

        $bukuId = $this->request->getPost('bukuId');
        $userId = session()->get('userID');

        try {
            $db = \Config\Database::connect();
            
            // Cek apakah buku sudah ada di koleksi
            $existing = $db->table('koleksipribadi')
                ->where('UserID', $userId)
                ->where('BukuID', $bukuId)
                ->get()
                ->getRow();

            if ($existing) {
                // Hapus dari koleksi
                $db->table('koleksipribadi')
                    ->where('UserID', $userId)
                    ->where('BukuID', $bukuId)
                    ->delete();

                return $this->response->setJSON([
                    'success' => true,
                    'message' => 'Buku dihapus dari koleksi',
                    'isCollected' => false
                ]);
            } else {
                // Tambah ke koleksi
                $db->table('koleksipribadi')->insert([
                    'UserID' => $userId,
                    'BukuID' => $bukuId
                ]);

                return $this->response->setJSON([
                    'success' => true,
                    'message' => 'Buku ditambahkan ke koleksi',
                    'isCollected' => true
                ]);
            }
        } catch (\Exception $e) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Terjadi kesalahan'
            ]);
        }
    }

    public function getKoleksi()
    {
        if (!session()->get('isLoggedIn')) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Silakan login terlebih dahulu'
            ]);
        }

        try {
            $db = \Config\Database::connect();
            
            $koleksi = $db->table('koleksipribadi')
                ->select('koleksipribadi.*, buku.Judul, buku.Foto, kategoribuku.NamaKategori')
                ->join('buku', 'buku.BukuID = koleksipribadi.BukuID')
                ->join('kategoribuku_relasi', 'buku.BukuID = kategoribuku_relasi.BukuID', 'left')
                ->join('kategoribuku', 'kategoribuku_relasi.KategoriID = kategoribuku.KategoriID', 'left')
                ->where('koleksipribadi.UserID', session()->get('userID'))
                ->get()
                ->getResultArray();

            return $this->response->setJSON([
                'success' => true,
                'koleksi' => $koleksi
            ]);
        } catch (\Exception $e) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Terjadi kesalahan saat memuat koleksi'
            ]);
        }
    }
}