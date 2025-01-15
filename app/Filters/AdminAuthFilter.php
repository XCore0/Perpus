<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AdminAuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (!session()->get('isLoggedIn')) {
            session()->setFlashdata('error', 'Silakan login terlebih dahulu');
            return redirect()->to(base_url('Auth/Login'));
        }

        // Cek role/kelas user
        $userKelas = session()->get('kelas');
        if ($userKelas !== 'Admin' && $userKelas !== 'Petugas') {
            session()->setFlashdata('error', 'Anda tidak memiliki akses ke halaman ini');
            return redirect()->to(base_url('/'));
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do nothing
    }
} 