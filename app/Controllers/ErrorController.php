<?php
declare(strict_types=1);

namespace App\Controllers;
use App\Core\Controller\ControllerTemplate_LEGACY;
use App\Core\Controller\HTTPError;

class ErrorController extends ControllerTemplate_LEGACY
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
