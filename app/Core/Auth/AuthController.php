<?php

namespace App\Core\Auth;

use CodeIgniter\Controller;
use App\Core\Controller\CURL;
use App\Core\Model\ModelTemplate;

final class AuthController extends Controller
{
    public function __construct(
        private ModelTemplate $model = new AuthModel(),
    ){}

    public function index()
    {
        if(session()->has('jwt_token')){
            return redirect()->to('/dashboard');
        }
        return view('layouts/login');
    }

    public function login()
    {
        $login_data = [
            'email'    => $this->request->getPost('email'),
            'password' => $this->request->getPost('password')
        ];

        if (!isset($login_data['email'])|| !isset($login_data['password']))
            return redirect()->back()->withInput()->with('error', 'Masukkan email dan password');

        $user = $this->model->where('email',$login_data['email'])->first();
        
        if(!$user)
            return redirect()->back()->withInput()->with('error', 'Akun tidak ditemukan, mohon hubungi admin');

        if (!password_verify($login_data['password'], $user['password']))
            return redirect()->back()->withInput()->with('error', 'Password salah, mohon dicoba kembali');


        $user = [
            'id'    => $user['id'],
            'email' => $user['email'],
            'role'  => (int) $user['role'],
        ];

        session()->set('user', $user);

        session()->set('user_specific_data', 'Akun not found');

        return redirect()->to('/dashboard')
            ->with('title', 'Dashboard')
            ->with('user_details', '');
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to(base_url("/login"));
    }

    public function dashboard()
    {
        $title = 'Dashboard';
        date_default_timezone_set('Asia/Bangkok');
        return view('/dashboard/dashboard', ['title' => $title]);
    }
}