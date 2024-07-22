<?php

namespace App\Models;

use CodeIgniter\Model;

class DaftarmitrasekolahModel extends Model
{
    protected $table = 'daftarmitrasekolah';
    protected $primarykey = 'id';
    protected $useTimestamps = false;
    protected $returnType = 'object';
    protected $allowedFields =['namasekolah', 'alamatsekolah', 'tglberdiri', 'kepsek', 'operator', 'fotosekolah'];
}