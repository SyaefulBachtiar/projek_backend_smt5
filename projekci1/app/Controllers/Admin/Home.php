<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\MhsModel;

class Home extends BaseController
{
    public function index()
    {
        $Mhs_model = new MhsModel();

        $data = [
            'titles' => 'Data Mahasiswa',
            'mhs' => $Mhs_model->findAll(),
            'mhsI' => $Mhs_model->findAll(1),
        ];
        return view('admin/home', $data);
    }
}

