<?php

namespace App\Models;

use CodeIgniter\Model;

class PeminjamanModel extends Model
{
    protected $table            = 'peminjaman';
    protected $primaryKey       = 'PeminjamanID';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'UserID',
        'BukuID',
        'TanggalPeminjaman',
        'TanggalPengembalian',
        'StatusPeminjaman',
    ];

    // Validasi jika diperlukan
    protected $validationRules = [
        'StatusPeminjaman' => 'required|in_list[Dipinjam,Dikembalikan,Terlambat]'
    ];

    public function getPeminjamanWithDetails()
    {
        $builder = $this->db->table('peminjaman');
        $builder->select('
            peminjaman.UserID,
            user.NamaLengkap,
            user.Username,
            GROUP_CONCAT(DISTINCT buku.Judul) as Buku,
            GROUP_CONCAT(DISTINCT peminjaman.TanggalPeminjaman) as TanggalPeminjaman,
            GROUP_CONCAT(DISTINCT peminjaman.TanggalPengembalian) as TanggalPengembalian,
            GROUP_CONCAT(DISTINCT peminjaman.StatusPeminjaman) as StatusPeminjaman,
            GROUP_CONCAT(DISTINCT peminjaman.PeminjamanID) as PeminjamanID
        ');
        $builder->join('user', 'user.UserID = peminjaman.UserID');
        $builder->join('buku', 'buku.BukuID = peminjaman.BukuID');
        $builder->groupBy('peminjaman.UserID, user.NamaLengkap, user.Username');
        $builder->orderBy('MAX(peminjaman.TanggalPeminjaman)', 'DESC');
        
        return $builder->get()->getResultArray();
    }

    public function getPeminjamanByUserId($userId)
    {
        return $this->where('UserID', $userId)
                    ->findAll();
    }
} 