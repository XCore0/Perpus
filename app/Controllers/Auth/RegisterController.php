<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\UserModel;

class RegisterController extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function Register()
    {
        return view('FormLoginRegis/Register');
    }

    public function store()
    {
        // Validasi input
        $rules = [
            'username' => 'required|min_length[4]|is_unique[user.Username]',
            'password' => 'required|min_length[6]',
            'confirm_password' => 'required|matches[password]',
            'email' => 'required|valid_email|is_unique[user.Email]',
            'nama_lengkap' => 'required',
            'alamat' => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('error', $this->validator->getErrors());
        }

        try {
            // Hash password
            $hashedPassword = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);

            // Data untuk insert dengan Kelas default "Peminjam"
            $data = [
                'Username' => $this->request->getPost('username'),
                'Password' => $hashedPassword,
                'Email' => $this->request->getPost('email'),
                'NamaLengkap' => $this->request->getPost('nama_lengkap'),
                'Alamat' => $this->request->getPost('alamat'),
                'Kelas' => 'Peminjam'  // Set default Kelas sebagai "Peminjam"
            ];

            // Insert data
            $this->userModel->insert($data);

            return redirect()->to('/Auth/Login')
                ->with('success', 'Registrasi berhasil! Silakan login.');

        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan saat mendaftar. Silakan coba lagi.');
        }
    }
}
