<?php
declare(strict_types=1);

namespace App\Core;

class HTTPError
{
    public static function renderErrorView($status_code, $custom_message = null)
    {
        $data = [
            'kode'       => $status_code,
            'title'      => '',
            'errorTitle' => '',
            'message'    => $custom_message
        ];

        switch ($status_code) {
            case 400:
                $data['title'] = 'Bad Request';
                $data['errorTitle'] = 'Oops! ada kesalahan pada permintaan Anda';
                $data['message'] ??= 'Permintaan yang anda buat tidak dapat diproses. 
                    Pastikan Anda telah memasukkan informasi dengan benar. Coba periksa 
                    kembali dan kirim ulang';
                break;
            case 401:
                $data['title'] = 'Unauthorized';
                $data['errorTitle'] = 'Akses terbatas';
                $data['message'] ??= 'Anda harus login untuk mengakses halaman ini';
                break;
            case 403:
                $data['title'] = 'Forbidden';
                $data['errorTitle'] = 'Access ditolak';
                $data['message'] ??= 'Anda tidak memiliki izin untuk melihat halaman ini. 
                    Kalau Anda merasa ini salah, hubungi admin.';
                break;
            case 404:
                $data['title'] = 'Not Found';
                $data['errorTitle'] = 'Halaman tidak ditemukan';
                $data['message'] ??= 'Kami tidak dapat menemukan halaman yang Anda cari. 
                    Periksa URL atau kembali ke halaman utama';
                break;
            case 405:
                $data['title'] = 'Method Not Allowed ';
                $data['errorTitle'] = 'Method HTTP yang Anda gunakan tidak tersedia';
                $data['message'] ??= 'Kami tidak menyediakan method HTTP tersebut. 
                    Periksa kembali URL dan method http Anda';
                break;
            case 500:
                $data['title'] = 'Internal Server Error';
                $data['errorTitle'] = 'Kesalahan Server';
                $data['message'] ??= 'Terjadi masalah pada server kami. 
                Silakan coba lagi nanti atau hubungi dukungan teknis jika masalah berlanjut';
                break;
            default:
                $data['title'] = 'Error';
                $data['errorTitle'] = 'Unexpected Error';
                $data['message'] ??= "Error fetching data. HTTP Status Code: $status_code";
                break;
        }

        return view('errors/html/general_error', $data);
    }

}