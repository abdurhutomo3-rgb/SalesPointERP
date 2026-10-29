<?php

namespace App\Models;

use CodeIgniter\Model;

class SaleModel extends Model
{
    protected $table = 'sales';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'nama_barang',
        'harga',
        'jumlah',
        'total',
        'tanggal'
    ];

    protected $useTimestamps = false;
}
