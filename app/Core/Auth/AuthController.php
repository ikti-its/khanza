<?php

namespace App\Core\Auth;

use CodeIgniter\Controller;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use App\Core\Controller\CURL;
use App\Core\ModelTemplate;

final class AuthController extends Controller
{
    public function __construct(
        private string $key = '',
        private string $alg = 'HS512',
        private ModelTemplate $model = new AuthModel(),
    ){
        $this->key = getenv('JWT_SECRET');
    }

    private function generate_JWT($user)
    {
        $payload = [
            'iat' => time(),
            'exp' => time() + 3600 * 24,
            'sub' => $user['id'],
            'role'=> (int) $user['role']
        ];

        return JWT::encode($payload, $this->key, $this->alg);
    }

    private function validate_JWT($token)
    {
        return JWT::decode($token, new Key($this->key, $this->alg));
    }

    public function jwt2(){
        $login_data = $this->request->getJSON(true);
        $user = $this->model->where('email',$login_data['email'])->first();
        
        if(!$user)
            return $this->response->setStatusCode(401)
                ->setJSON(['error' => 'User with email' . $login_data['email'] . ' not found']);

        if (!password_verify($login_data['password'], $user['password']))
            return $this->response->setStatusCode(402)
                ->setJSON(['error' => 'Incorrect password']);

        return $this->response->setStatusCode(200)
            ->setJSON([
                'code'  => 200,
                'token' => $this->generate_JWT($user),
                'user_details' => [
                    'id'    => $user['id'],
                    'email' => $user['email'],
                    'role'  => (int) $user['role'],
                ]
            ]);    
    }

    public function jwt(array $login_data){
        if (!isset($login_data['email'])|| !isset($login_data['password']))
            return [
                'code'  => 400,
                'error' => 'Both email and password required'
            ];
        
        $user = $this->model->where('email',$login_data['email'])->first();
        
        if(!$user)
            return [
                'code'  => 401,
                'error' => 'User with email' . $login_data['email'] . ' not found'
            ];

        if (!password_verify($login_data['password'], $user['password']))
            return [
                'code'  => 402,
                'error' => 'Incorrect password'
            ];

        return [
            'code'  => 200,
            'token' => $this->generate_JWT($user),
            'user_details' => [
                'id'    => $user['id'],
                'email' => $user['email'],
                'role'  => (int) $user['role'],
            ]
        ];    
    }

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

        $data = $this->jwt($login_data);
        $code = $data['code'];

        if ($code === 402) {
            return redirect()->back()->withInput()->with('error', 'Password salah, mohon dicoba kembali');
        } elseif ($code === 401) {
            return redirect()->back()->withInput()->with('error', 'Akun tidak ditemukan, mohon hubungi admin');
        }

        $token = $data['token'];
        session()->set('jwt_token', $token);

        $user_details = $data['user_details'];
        session()->set('user_details', $user_details);

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

        $token = session()->get('jwt_token');
        $headers = [
            'Authorization: Bearer ' . $token,
            'Content-Type: application/json'
        ];

        $tanggal = date('Y-m-d');

        $user_specific_url = getenv('api_URL') . '/w/home/pegawai?tanggal=' . $tanggal;
        $user_details_url = getenv('api_URL') . '/auth';

        $ch = curl_init($user_details_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $response = curl_exec($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        
        if ($http_code === 200 && $response) {
            $user_details_data = json_decode($response, true);
            if (isset($user_details_data['data'])) {
                session()->set('user_details', $user_details_data['data']);
            }
        }

        $user_specific_ch = curl_init($user_specific_url);
        curl_setopt($user_specific_ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($user_specific_ch, CURLOPT_HTTPHEADER, $headers);

        $user_specific_response = curl_exec($user_specific_ch);

        if ($user_specific_response) {
            $user_specific_data = json_decode($user_specific_response, true);
            session()->set('user_specific_data', $user_specific_data['data']);
        }

        return view('/dashboard/dashboard', ['title' => $title]);
    }

    public function login2()
    {
        if (!$this->request->getPost()) {
            return view('login');
        }

        $login_data = [
            'email'    => $this->request->getPost('email'),
            'password' => $this->request->getPost('password')
        ];

        $response = CURL::call('POST', '/auth/login', $login_data);
        $http_status_code = $response['kode'];

        if ($http_status_code === 401) {
            return redirect('login')->with('passwordsalah', 'Password salah, mohon dicoba kembali');
        } elseif ($http_status_code === 404 || $http_status_code !== 200) {
            return redirect('login')->with('akunsalah', 'Akun tidak ditemukan, mohon hubungi admin');
        }

        // Login success -> Receive JWT token
        $token = $response['data']['data']['token'];
        session()->set('jwt_token', $token);

        // Store user details in session along with the token
        $user_details = CURL::call('GET', '/auth'); 
        session()->set('user_details', $user_details['data']['data']);

        // Check if the user role is 2 or 1
        $role = $user_details['data']['data']['role'];
        if ($role === 2 || $role === 1) {
            $tanggal = date('Y-m-d');
            $user_specific_response = CURL::call('GET', '/w/home/pegawai?tanggal=' . $tanggal);
            session()->set('user_specific_data', $user_specific_response['data']['data']);
        }
        return redirect()->to('/dashboard')
            ->with('title', 'Dashboard')
            ->with('user_details', $user_details);
    }

    public function profile()
    {
        $header = $this->request->getHeaderLine('Authorization');

        if (!$header) {
            return $this->response
                ->setStatusCode(401)
                ->setJSON(['error' => 'Token required']);
        }

        $token = str_replace('Bearer ', '', $header);

        try {
            $decoded = $this->validate_JWT($token);
        } catch (\Exception $e) {
            return $this->response
                ->setStatusCode(401)
                ->setJSON(['error' => 'Invalid token']);
        }

        return $this->response->setJSON([
            'user' => $decoded
        ]);
    }
}