<?php
declare(strict_types=1);

namespace App\Controllers;
use App\Core\Controller\Legacy\ControllerTemplateLegacy;
use App\Core\Controller\Legacy\HTTPError;

class Home extends ControllerTemplateLegacy
{
    public function index(): string
    {
        return view('login');
    }
}