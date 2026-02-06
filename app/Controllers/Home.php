<?php
declare(strict_types=1);

namespace App\Controllers;

class Home extends ControllerTemplate
{
    public function index(): string
    {
        return view('login');
    }
}