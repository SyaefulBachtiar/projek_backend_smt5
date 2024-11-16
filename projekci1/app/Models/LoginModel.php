<?php

namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model
{
    protected $table            = 'account';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['name', 'password', 'email', 'role_id'];

}