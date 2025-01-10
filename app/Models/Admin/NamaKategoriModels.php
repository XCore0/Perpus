<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class NamaKategoriModels extends Model
{
    protected $table = 'kategoribuku';
    protected $primaryKey = 'KategoriID';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    
    protected $allowedFields = [
        'NamaKategori',
    ];

    protected $validationRules = [
        'NamaKategori' => 'required|min_length[3]|max_length[100]'
    ];
}
