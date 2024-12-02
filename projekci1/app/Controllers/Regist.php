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

        $password1 = $this->request->getPost('password');
        $password2 = $this->request->getPost('repeat_password');

        if($password1 === $password2){


        
        $data  = [
            'name' => $this->request->getPost('nama'),
            'email' => $this->request->getPost('email'),
            'password' => password_hash($password1, PASSWORD_DEFAULT),
            'role_id' => $this->request->getPost('role_id')
        ];
        $loginModel->insert($data);
        session()->setFlashdata('berhasil', 'Data Mahasiswa berhasil di tambahkan');

        return redirect()->to('regist');
    }else{
        
        return redirect()->to('regist')->with('pesan', 'Password tidak sama');
    }
    }

}


