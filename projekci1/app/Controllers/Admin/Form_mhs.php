<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\MhsModel;

class Form_mhs extends BaseController
{
    public function index()
    {
        $data = [
            'titles' => 'Form Input'
        ];

        return view('admin/form_mhs', $data);
    }
    public function store() {
        if(!$this->validate([
            'nim' => 'required',
            'nama' => 'required',
            'email' => 'required|valid_email',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'image' => 'required',
        ])){
            return redirect()->to('admin/home')->withInput();
        }
    }

    public function edit() {
        echo "halaman edit";
    }


}

