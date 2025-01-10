<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\DataBukuModels;
use App\Models\Admin\NamaKategoriModels;

class DataBukuController extends BaseController
{
    protected $bukuModel;
    protected $kategoriModel;

    public function __construct()
    {
        $this->bukuModel = new DataBukuModels();
        $this->kategoriModel = new NamaKategoriModels();
    }

    public function DataBuku()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('buku');
        $builder->select('buku.*, kategoribuku.NamaKategori, kategoribuku.KategoriID');
        $builder->join('kategoribuku_relasi', 'buku.BukuID = kategoribuku_relasi.BukuID', 'left');
        $builder->join('kategoribuku', 'kategoribuku_relasi.KategoriID = kategoribuku.KategoriID', 'left');
        
        $bukus = $builder->get()->getResultArray();
        
        // Debug untuk memeriksa data
        // var_dump($bukus); die;
        
        $data = [
            'title' => 'Data Buku',
            'bukus' => $bukus,
            'kategoris' => $this->kategoriModel->findAll()
        ];
        
        return view('Admin/DataBuku', $data);
    }

    public function store()
    {
        // Validasi input
        $rules = [
            'judul' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required|numeric',
            'kategori_id' => 'required',
            'stok' => 'required',
            'foto' => 'uploaded[foto]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Validasi gagal: ' . implode(', ', $this->validator->getErrors()));
        }

        $db = \Config\Database::connect();
        $db->transStart();

        try {
            // 1. Upload foto
            $foto = $this->request->getFile('foto');
            $namaFoto = $foto->getRandomName();
            $foto->move('uploads/buku', $namaFoto);

            // 2. Insert data buku
            $dataBuku = [
                'Judul' => $this->request->getPost('judul'),
                'Penulis' => $this->request->getPost('penulis'),
                'Penerbit' => $this->request->getPost('penerbit'),
                'TahunTerbit' => $this->request->getPost('tahun_terbit'),
                'Stok' => $this->request->getPost('stok'),
                'Foto' => $namaFoto
            ];

            // Insert ke tabel buku
            $db->table('buku')->insert($dataBuku);
            $bukuId = $db->insertID();

            // 3. Insert ke tabel kategoribuku_relasi
            $kategoriId = $this->request->getPost('kategori_id');
            
            // Pastikan kedua ID ada sebelum insert ke relasi
            if ($bukuId && $kategoriId) {
                $dataRelasi = [
                    'BukuID' => $bukuId,
                    'KategoriID' => $kategoriId
                ];
                
                // Insert ke tabel relasi
                $result = $db->table('kategoribuku_relasi')->insert($dataRelasi);
                
                if (!$result) {
                    throw new \RuntimeException('Gagal menyimpan relasi kategori');
                }
            } else {
                throw new \RuntimeException('ID Buku atau Kategori tidak valid');
            }

            // Commit transaksi jika semua berhasil
            $db->transComplete();

            if ($db->transStatus() === false) {
                // Jika gagal, hapus foto yang sudah diupload
                if (file_exists('uploads/buku/' . $namaFoto)) {
                    unlink('uploads/buku/' . $namaFoto);
                }
                throw new \RuntimeException('Gagal menyimpan data');
            }

            return redirect()->to('/Admin/Buku')
                ->with('success', 'Buku berhasil ditambahkan');

        } catch (\Exception $e) {
            $db->transRollback();
            
            // Hapus foto jika ada error
            if (isset($namaFoto) && file_exists('uploads/buku/' . $namaFoto)) {
                unlink('uploads/buku/' . $namaFoto);
            }

            log_message('error', '[ERROR] {exception}', ['exception' => $e]);
            
            return redirect()->back()
                ->withInput()
                ->with('error', 'Gagal menyimpan data: ' . $e->getMessage());
        }
    }

    public function update($id)
    {
        // Validasi input
        $rules = [
            'judul' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required|numeric',
            'kategori_id' => 'required'
        ];

        // Validasi foto hanya jika ada upload foto baru
        if ($this->request->getFile('foto')->isValid()) {
            $rules['foto'] = 'is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]';
        }

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Validasi gagal: ' . implode(', ', $this->validator->getErrors()));
        }

        $db = \Config\Database::connect();
        $db->transStart();

        try {
            // 1. Siapkan data buku
            $dataBuku = [
                'Judul' => $this->request->getPost('judul'),
                'Penulis' => $this->request->getPost('penulis'),
                'Penerbit' => $this->request->getPost('penerbit'),
                'TahunTerbit' => $this->request->getPost('tahun_terbit'),
                'Stok' => $this->request->getPost('stok') // Pastikan field ini ada
            ];

            // 2. Handle foto jika ada
            $foto = $this->request->getFile('foto');
            if ($foto->isValid() && !$foto->hasMoved()) {
                // Ambil data buku lama
                $bukuLama = $db->table('buku')->where('BukuID', $id)->get()->getRow();
                
                // Hapus foto lama jika ada
                if ($bukuLama && $bukuLama->Foto && file_exists('uploads/buku/' . $bukuLama->Foto)) {
                    unlink('uploads/buku/' . $bukuLama->Foto);
                }
                
                // Upload foto baru
                $namaFoto = $foto->getRandomName();
                $foto->move('uploads/buku', $namaFoto);
                $dataBuku['Foto'] = $namaFoto;
            }

            // 3. Update data buku
            $updateBuku = $db->table('buku')->where('BukuID', $id)->update($dataBuku);
            if (!$updateBuku) {
                throw new \RuntimeException('Gagal mengupdate data buku');
            }

            // 4. Update relasi kategori
            // Cek apakah relasi sudah ada
            $existingRelasi = $db->table('kategoribuku_relasi')
                ->where('BukuID', $id)
                ->get()
                ->getRow();

            $kategoriId = $this->request->getPost('kategori_id');

            if ($existingRelasi) {
                // Update relasi yang ada
                $updateRelasi = $db->table('kategoribuku_relasi')
                    ->where('BukuID', $id)
                    ->update(['KategoriID' => $kategoriId]);
                
                if (!$updateRelasi) {
                    throw new \RuntimeException('Gagal mengupdate relasi kategori');
                }
            } else {
                // Buat relasi baru jika belum ada
                $insertRelasi = $db->table('kategoribuku_relasi')->insert([
                    'BukuID' => $id,
                    'KategoriID' => $kategoriId
                ]);
                
                if (!$insertRelasi) {
                    throw new \RuntimeException('Gagal membuat relasi kategori');
                }
            }

            $db->transComplete();

            if ($db->transStatus() === false) {
                // Hapus foto baru jika ada dan transaksi gagal
                if (isset($namaFoto) && file_exists('uploads/buku/' . $namaFoto)) {
                    unlink('uploads/buku/' . $namaFoto);
                }
                throw new \RuntimeException('Gagal mengupdate data');
            }

            return redirect()->to('/Admin/Buku')
                ->with('success', 'Data berhasil diupdate');

        } catch (\Exception $e) {
            $db->transRollback();
            
            // Hapus foto baru jika ada error
            if (isset($namaFoto) && file_exists('uploads/buku/' . $namaFoto)) {
                unlink('uploads/buku/' . $namaFoto);
            }

            log_message('error', '[ERROR] {exception}', ['exception' => $e]);
            
            return redirect()->back()
                ->withInput()
                ->with('error', 'Gagal mengupdate data: ' . $e->getMessage());
        }
    }

    public function delete($id)
    {
        $db = \Config\Database::connect();
        $db->transStart();

        try {
            // 1. Ambil data buku untuk hapus foto
            $buku = $db->table('buku')->where('BukuID', $id)->get()->getRow();
            
            // 2. Hapus relasi kategori
            $db->table('kategoribuku_relasi')->where('BukuID', $id)->delete();
            
            // 3. Hapus data buku
            $db->table('buku')->where('BukuID', $id)->delete();

            $db->transComplete();

            if ($db->transStatus() === false) {
                throw new \Exception('Gagal menghapus data');
            }

            // 4. Hapus foto setelah transaksi berhasil
            if ($buku->Foto && file_exists('uploads/buku/' . $buku->Foto)) {
                unlink('uploads/buku/' . $buku->Foto);
            }

            return redirect()->to('/Admin/Buku')->with('success', 'Data berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
        try {
            $db = \Config\Database::connect();
            $builder = $db->table('buku');
            $builder->select('buku.*, kategoribuku_relasi.KategoriID');
            $builder->join('kategoribuku_relasi', 'buku.BukuID = kategoribuku_relasi.BukuID', 'left');
            $builder->where('buku.BukuID', $id);
            
            $buku = $builder->get()->getRowArray();
            
            // Debug
            log_message('debug', 'Query: ' . $db->getLastQuery());
            log_message('debug', 'Data Buku: ' . json_encode($buku));
            
            if (!$buku) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Buku tidak ditemukan'
                ]);
            }
            
            return $this->response->setJSON([
                'success' => true,
                'data' => $buku
            ]);
            
        } catch (\Exception $e) {
            log_message('error', '[ERROR] {exception}', ['exception' => $e]);
            
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ]);
        }
    }
}
