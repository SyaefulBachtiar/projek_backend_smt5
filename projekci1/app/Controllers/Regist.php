<?php

namespace App\Controllers;
use App\Models\LoginModel;

use PDO;

class Regist extends BaseController
{
    public function index(){
        $data = [
            'titles' => 'Registrasi'
        ];

        return view('regist', $data);
    }

    public function regist_action(){

        $loginModel = new LoginModel;

        $loginModel->insert([
            'name' => $this->request->getPost('nama'),
            'email' => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT)
        ]);

        session()->setFlashdata('berhasil', 'Data Mahasiswa berhasil di tambahkan');

        return redirect()->to('regist');
    }

}


