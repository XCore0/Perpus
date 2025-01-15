<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\NamaKategoriModels;

class NamaKategoriController extends BaseController
{
    protected $kategoriModel;

    public function __construct()
    {
        $this->kategoriModel = new NamaKategoriModels();

    }

    public function NamaKategori()
    {
        $data['kategoris'] = $this->kategoriModel->findAll();
        return view('Admin/NamaKategori', $data);
    }

    public function store()
    {
        $rules = [
            'nama_kategori' => 'required|min_length[3]|max_length[100]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Gagal menambahkan kategori: ' . implode(' ', $this->validator->getErrors()));
        }

        try {
            $data = [
                'NamaKategori' => $this->request->getPost('nama_kategori')
            ];

            $this->kategoriModel->insert($data);
            return redirect()->to(route_to('Admin.Kategori'))
                ->with('success', 'Kategori baru berhasil ditambahkan!');
        } catch (\Exception $e) {
            log_message('error', '[NamaKategoriController::store] ' . $e->getMessage());
            return redirect()->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan saat menyimpan data.');
        }
    }

    public function update($id = null)
    {
        // Validasi ID
        if ($id === null) {
            return redirect()->back()->with('error', 'ID Kategori tidak ditemukan');
        }

        // Validasi input
        $rules = [
            'nama_kategori' => 'required|min_length[3]|max_length[100]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Gagal mengupdate kategori: ' . implode(' ', $this->validator->getErrors()));
        }

        try {
            // Cek apakah kategori exists
            $kategori = $this->kategoriModel->find($id);
            if (!$kategori) {
                return redirect()->back()->with('error', 'Kategori tidak ditemukan');
            }

            // Update data
            $data = [
                'NamaKategori' => $this->request->getPost('nama_kategori')
            ];

            $this->kategoriModel->update($id, $data);
            
            return redirect()->to(route_to('Admin.Kategori'))
                ->with('success', 'Kategori berhasil diperbarui!');
        } catch (\Exception $e) {
            log_message('error', '[NamaKategoriController::update] ' . $e->getMessage());
            return redirect()->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan saat mengupdate data.');
        }
    }

    public function delete($id)
    {
        try {
            $this->kategoriModel->delete($id);
            return redirect()->to(route_to('Admin.Kategori'))
                ->with('success', 'Kategori berhasil dihapus!');
        } catch (\Exception $e) {
            log_message('error', '[NamaKategoriController::delete] ' . $e->getMessage());
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan saat menghapus data.');
        }
    }
}