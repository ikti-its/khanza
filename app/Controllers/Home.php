<?php
declare(strict_types=1);

namespace App\Controllers;
use App\Core\Controller\ControllerTemplateLegacy;
use App\Core\Controller\HTTPError;

class Home extends ControllerTemplateLegacy
{
    public function index(): string
    {
        return view('login');
    }
}