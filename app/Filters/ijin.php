<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class Ijin implements FilterInterface
{
    #[\Override()]
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session()->has('user_details');
        if(!$session)
            return redirect()->to(base_url('/login'));

        /** @var array{'role':string} */
        $user_details = session()->get('user_details');
        $role = $user_details['role'];
        if ($role == 2)
            return redirect()->to('/test-403');
        
        return null;
    }

    #[\Override()]
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        return null;
    }
}
