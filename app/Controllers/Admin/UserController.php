<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;

class UserController extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function User()
    {
        $data = [
            'title' => 'Pengguna - Admin Dashboard',
            'users' => $this->userModel->findAll()
        ];
        return view('Admin/User', $data);
    }

    public function create()
    {
        // Validasi input
        $rules = [
            'Username' => 'required|min_length[4]|is_unique[user.Username]',
            'Password' => 'required|min_length[6]',
            'Email' => 'required|valid_email|is_unique[user.Email]',
            'NamaLengkap' => 'required',
            'Alamat' => 'required',
            'Kelas' => 'required|in_list[Admin,Petugas,Peminjam]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('error', $this->validator->getErrors());
        }

        try {
            // Hash password
            $hashedPassword = password_hash($this->request->getPost('Password'), PASSWORD_DEFAULT);

            // Data untuk insert
            $data = [
                'Username' => $this->request->getPost('Username'),
                'Password' => $hashedPassword,
                'Email' => $this->request->getPost('Email'),
                'NamaLengkap' => $this->request->getPost('NamaLengkap'),
                'Alamat' => $this->request->getPost('Alamat'),
                'Kelas' => $this->request->getPost('Kelas')
            ];

            // Insert data
            $this->userModel->insert($data);

            return redirect()->to(base_url('Admin/User'))
                ->with('success', 'Pengguna berhasil ditambahkan');

        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan saat menambah pengguna.');
        }
    }

    public function update($id = null)
    {
        if (!$id) {
            return redirect()->back()->with('error', 'ID pengguna tidak ditemukan');
        }

        // Validasi input
        $rules = [
            'Username' => "required|min_length[4]|is_unique[user.Username,UserID,$id]",
            'Email' => "required|valid_email|is_unique[user.Email,UserID,$id]",
            'NamaLengkap' => 'required',
            'Alamat' => 'required',
            'Kelas' => 'required|in_list[Admin,Petugas,Peminjam]'
        ];

        // Jika password diisi, tambahkan validasi
        if ($this->request->getPost('Password')) {
            $rules['Password'] = 'min_length[6]';
        }

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('error', $this->validator->getErrors());
        }

        try {
            $data = [
                'Username' => $this->request->getPost('Username'),
                'Email' => $this->request->getPost('Email'),
                'NamaLengkap' => $this->request->getPost('NamaLengkap'),
                'Alamat' => $this->request->getPost('Alamat'),
                'Kelas' => $this->request->getPost('Kelas')
            ];

            // Update password hanya jika diisi
            if ($this->request->getPost('Password')) {
                $data['Password'] = password_hash($this->request->getPost('Password'), PASSWORD_DEFAULT);
            }

            // Update data
            $this->userModel->update($id, $data);

            return redirect()->to(base_url('Admin/User'))
                ->with('success', 'Pengguna berhasil diperbarui');

        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan saat memperbarui pengguna.');
        }
    }

    public function delete($id = null)
    {
        if (!$id) {
            return redirect()->back()->with('error', 'ID pengguna tidak ditemukan');
        }

        try {
            // Cek apakah user yang akan dihapus bukan user yang sedang login
            if ($id == session()->get('UserID')) {
                return redirect()->back()->with('error', 'Tidak dapat menghapus akun yang sedang digunakan');
            }

            // Hapus data
            $this->userModel->delete($id);

            return redirect()->to(base_url('Admin/User'))
                ->with('success', 'Pengguna berhasil dihapus');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan saat menghapus pengguna.');
        }
    }

    public function getUser($id = null)
    {
        if (!$id) {
            return $this->response->setJSON(['error' => 'ID pengguna tidak ditemukan']);
        }

        $user = $this->userModel->find($id);
        
        if ($user) {
            // Hapus password dari response
            unset($user['Password']);
            return $this->response->setJSON($user);
        }

        return $this->response->setJSON(['error' => 'Pengguna tidak ditemukan']);
    }
}
