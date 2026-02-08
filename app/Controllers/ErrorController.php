<?php
declare(strict_types=1);

namespace App\Controllers;
use App\Core\ControllerTemplate;

class ErrorController extends ControllerTemplate
{
    public function noAccess403()
    {
        $data['kode'] = 403;
        $data['title'] = 'Forbidden';
        $data['errorTitle'] = 'Akses ditolak';
        $data['message'] = 'Anda tidak memiliki izin untuk melihat halaman ini. Kalau Anda merasa ini salah, hubungi admin.';
        return view('errors/html/error_403', ['data' => $data]);
    }
}
