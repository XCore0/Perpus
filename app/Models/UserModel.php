<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'user';
    protected $primaryKey       = 'UserID';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['Username', 'Password', 'Email', 'NamaLengkap', 'Alamat', 'Kelas'];
} 