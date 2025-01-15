<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class CartController extends ResourceController
{
    public function __construct()
    {
        // Bersihkan cart saat controller diinisialisasi
        $this->cleanCart();
    }

    private function cleanCart()
    {
        $cart = session()->get('cart') ?? [];
        
        // Hapus item yang tidak valid
        $cart = array_filter($cart, function($item) {
            return isset($item['bukuId']) && 
                   isset($item['judul']) && 
                   isset($item['foto']) && 
                   isset($item['kategori']) &&
                   !empty($item['bukuId']) && 
                   !empty($item['judul']) && 
                   $item['judul'] !== 'undefined' &&
                   !empty($item['foto']) && 
                   !empty($item['kategori']);
        });

        // Reset array keys
        $cart = array_values($cart);
        
        // Update session
        session()->set('cart', $cart);
        
        return $cart;
    }

    public function getItems()
    {
        if (!$this->request->isAJAX()) {
            return $this->failUnauthorized('Invalid request');
        }

        $cart = $this->cleanCart();

        return $this->response->setJSON([
            'success' => true,
            'items' => $cart,
            'cartCount' => count($cart)
        ]);
    }

    public function add()
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
        $judul = $this->request->getPost('judul');
        $foto = $this->request->getPost('foto');
        $kategori = $this->request->getPost('kategori');

        // Debug log
        log_message('debug', 'Received data: ' . json_encode([
            'bukuId' => $bukuId,
            'judul' => $judul,
            'foto' => $foto,
            'kategori' => $kategori
        ]));

        // Validasi data yang diterima
        if (empty($bukuId) || empty($judul) || empty($foto) || empty($kategori)) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Data buku tidak lengkap',
                'debug' => [
                    'bukuId' => $bukuId,
                    'judul' => $judul,
                    'foto' => $foto,
                    'kategori' => $kategori
                ]
            ]);
        }

        $cart = $this->cleanCart();

        // Cek jumlah buku di keranjang
        if (count($cart) >= 3) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Maksimal peminjaman 3 buku'
            ]);
        }

        // Cek duplikasi
        if (in_array($bukuId, array_column($cart, 'bukuId'))) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Buku sudah ada di keranjang'
            ]);
        }

        // Tambah ke keranjang
        $cart[] = [
            'bukuId' => $bukuId,
            'judul' => $judul,
            'foto' => $foto,
            'kategori' => $kategori
        ];

        session()->set('cart', $cart);

        return $this->response->setJSON([
            'success' => true,
            'message' => 'Buku berhasil ditambahkan ke keranjang',
            'cartCount' => count($cart)
        ]);
    }

    public function remove()
    {
        if (!$this->request->isAJAX()) {
            return $this->failUnauthorized('Invalid request');
        }

        $bukuId = $this->request->getPost('bukuId');
        $cart = $this->cleanCart();

        $cart = array_filter($cart, function($item) use ($bukuId) {
            return $item['bukuId'] !== $bukuId;
        });

        $cart = array_values($cart);
        session()->set('cart', $cart);

        return $this->response->setJSON([
            'success' => true,
            'message' => 'Buku berhasil dihapus dari keranjang',
            'cartCount' => count($cart)
        ]);
    }
} 