<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class ForgotPassword extends BaseController
{
    public function index()
    {
        return view('forgot_password');
    }
}
