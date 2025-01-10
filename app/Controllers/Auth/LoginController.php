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
        $rules = [
            'username' => 'required',
            'password' => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Username dan Password harus diisi');
        }

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Koneksi database
        $db = \Config\Database::connect();
        
        // Cek user di database
        $user = $db->table('users')
            ->where('Username', $username)
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
                'isLoggedIn' => true
            ];
            session()->set($sessionData);

            // Redirect berdasarkan kelas/role
            switch ($user->Kelas) {
                case 'Admin':
                    return redirect()->to('/Admin/Dashboard');
                case 'Petugas':
                    return redirect()->to('/Petugas/Dashboard');
                case 'Peminjam':
                    return redirect()->to('/Peminjam/Dashboard');
                default:
                    return redirect()->to('/');
            }
        }

        return redirect()->back()
            ->withInput()
            ->with('error', 'Username atau Password salah');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login')->with('success', 'Berhasil logout');
    }
}
