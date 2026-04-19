<?php
declare(strict_types=1);

namespace App\Controllers;
use App\Core\Controller\ControllerTemplate_LEGACY;
use App\Core\Controller\HTTPError;

class Home extends ControllerTemplate_LEGACY
{
    public function index(): string
    {
        return view('login');
    }
}