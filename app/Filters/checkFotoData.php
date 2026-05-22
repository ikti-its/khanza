<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class CheckFotoData implements FilterInterface
{
    #[\Override()]
    public function before(RequestInterface $request, $arguments = null)
    {
        if(!session()->has('jwt_token'))
            return redirect()->to(base_url("/login"));

        if (!session()->has('foto_data'))
            return redirect()->to('/dashboard');

        return $request;
    }

    #[\Override()]
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        return null;
    }
}
