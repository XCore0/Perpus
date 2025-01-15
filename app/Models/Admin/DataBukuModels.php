<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class DataBukuModels extends Model
{
    protected $table = 'buku';
    protected $primaryKey = 'BukuID';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    
    protected $allowedFields = [
        'Judul',
        'Penulis',
        'Penerbit',
        'TahunTerbit',
        'Stok',
        'Foto'
    ];
}