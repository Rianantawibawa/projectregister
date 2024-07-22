<?php

namespace App\Models;

use CodeIgniter\Model;

class PenjadwalanModel extends Model
{
    protected $table = 'penjadwalan';
    protected $primarykey = 'id';
    protected $useTimestamps = false;
    protected $returnType = 'object';
    protected $allowedFields =['namaguru', 'sekolah', 'kelas', 'tanggal'];
}