<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'ID';
    protected $allowedFields = [
        'username',
        'password',
        'role',
        'created_at'
    ];

    protected $useTimestamps = false;
}
