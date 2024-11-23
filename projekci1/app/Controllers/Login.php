<?php

namespace App\Controllers;
use App\Models\LoginModel;
class Login extends BaseController
{
    public function index(){
        $data = [
            'validation' => service('validation')
            // service('validation')
        ];
        return view('login', $data);
    }
    public function login_action() {
        $rules =[
            'email' => 'required',
            'password' => 'required'
        ];
        if(!$this->validate($rules)){
            $data['validation'] = $this->validator;
            return view('login', $data);
        }else{
            $session = session();
            $loginModel = new LoginModel;

            $email = $this->request->getVar('email');
            $password = $this->request->getVar('password');
            $cekUsername = $loginModel->where('email', $email)->first();

            if($cekUsername){

             $password_db = $cekUsername['password'];
             $cekPassword = password_verify($password, $password_db);
              if($cekPassword){

                $session_data = [
                    'nama'      => $cekUsername['name'],
                    'logged_in' => true,
                    'roleid'    => $cekUsername['role_id']
                ];
                $session->set($session_data);
                switch($cekUsername['role_id']){
                    case 'admin':
                        return redirect()->to('admin/home');
                    case 'user':
                        return redirect()->to('user/home');
                    default:
                        $session->setFlashdata('pesan', 'Password salah');
                        return redirect()->to('/');
                }

              }else{

                $session->setFlashdata('pesan', 'Password salah');
                return redirect()->to('/');
              }


            }else{

                $session->setFlashdata('pesan', 'Email salah');
                return redirect()->to('/');
            }
        }
    }

    public function logout() {
        $session = session();
        session()->destroy();
        return redirect()->to('/');
    }

}
