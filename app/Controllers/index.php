<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class index extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();
        
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

        $data = [
            'books' => $books,
            'categories' => $categories,
            'bookCountByCategory' => $bookCountByCategory,
            'totalBooks' => count($books)
        ];

        return view('User/index', $data);
    }
}