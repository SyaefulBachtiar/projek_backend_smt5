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
        $Mhs_model = new MhsModel();

        $Mhs_model->insert([
            'npm' => $this->request->getPost('nim'),
            'nama' => $this->request->getPost('nama'),
            'email' => $this->request->getPost('email'),
            'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'alamat' => $this->request->getPost('alamat'),
            'image' => $this->request->getPost('image'),
        ]); 

        session()->setFlashdata('berhasil', 'Data Mahasiswa berhasil di tambahkan');

        return redirect()->to('admin/home');
    }

    public function edit($id_mhs){
        $Mhs_model = new MhsModel();

        $data = [
            'titles' => 'Edit Data',
            'mhs'   => $Mhs_model->find($id_mhs)
        ];
        return view('admin/edit_mhs', $data);
    }
 


}

