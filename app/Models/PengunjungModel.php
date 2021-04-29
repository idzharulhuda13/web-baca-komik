<?php

namespace App\Models;

use CodeIgniter\Model;

class PengunjungModel extends Model
{
    protected $table = 'pengunjung';
    protected $useTimestamps = true;

    public function search($keyword)
    {
        $builder = $this->table('pengunjung');
        $builder->like('nama', $keyword)->orLike('alamat', $keyword);
        return $builder;
    }
}
