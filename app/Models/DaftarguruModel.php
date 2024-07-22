<?php

namespace App\Models;

use CodeIgniter\Model;

class DaftarguruModel extends Model
{
    protected $table = 'daftarguru';
    protected $primarykey = 'id';
    protected $useTimestamps = false;
    protected $returnType = 'object';
    protected $allowedFields =['namaguru', 'alamatguru', 'ttl', 'hp','pendidikan', 'ijazah','ktp','cv' ];
}