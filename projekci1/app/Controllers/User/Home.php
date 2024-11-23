<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'titles' => 'Table Mahasiswa/User'
        ];
        return view('user/home', $data);
    }
}
