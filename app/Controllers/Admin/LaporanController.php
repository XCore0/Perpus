<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class LaporanController extends BaseController
{

    public function Laporan()
    {
        $data = [
            'title' => 'Laporan - Admin Dashboard'
        ];
        return view('Admin/Laporan', $data);
    }
}
