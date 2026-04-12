<?php
declare(strict_types=1);

namespace App\Controllers;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\HTTPError;

class Home extends ControllerTemplate
{
    public function index(): string
    {
        return view('login');
    }
}