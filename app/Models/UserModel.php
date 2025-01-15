<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'user';
    protected $primaryKey       = 'UserID';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'Username',
        'Password',
        'Email',
        'NamaLengkap',
        'Alamat',
        'Kelas'  // enum('Admin','Petugas','Peminjam')
    ];

    // Dates
    protected $useTimestamps = false;
} 