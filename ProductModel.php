<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'nama_barang',
        'kategori',
        'harga',
        'stok'
    ];

    protected $useTimestamps = false;
}
