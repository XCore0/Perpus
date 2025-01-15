<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class LoginController extends BaseController
{
    public function Login()
    {
        return view('FormLoginRegis/Login');
    }

    public function authenticate()
    {
        if (!$this->request->isAJAX()) {
            return redirect()->back();
        }

        $rules = [
            'username' => 'required',
            'password' => 'required'
        ];

        if (!$this->validate($rules)) {
            return $this->response->setJSON([
                'success' => false,
                'error' => 'Username/Email dan Password harus diisi'
            ]);
        }

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Koneksi database
        $db = \Config\Database::connect();
        
        // Cek user berdasarkan username atau email
        $user = $db->table('user')
            ->where('Username', $username)
            ->orWhere('Email', $username)
            ->get()
            ->getRow();

        // Verifikasi user dan password
        if ($user && password_verify($password, $user->Password)) {
            // Set session
            $sessionData = [
                'userID' => $user->UserID,
                'username' => $user->Username,
                'namaLengkap' => $user->NamaLengkap,
                'email' => $user->Email,
                'kelas' => $user->Kelas,
                'role' => $user->Kelas,
                'isLoggedIn' => true
            ];
            session()->set($sessionData);

            // Return JSON response dengan URL redirect
            return $this->response->setJSON([
                'success' => true,
                'redirect' => $user->Kelas == 'Admin' || $user->Kelas == 'Petugas' 
                    ? base_url('/Admin/Dashboard') 
                    : base_url('/'),
                'message' => 'Selamat datang ' . $user->NamaLengkap
            ]);
        }

        return $this->response->setJSON([
            'success' => false,
            'error' => 'Username/Email atau Password salah'
        ]);
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/Auth/Login')
            ->with('success', 'Berhasil logout');
    }
}
