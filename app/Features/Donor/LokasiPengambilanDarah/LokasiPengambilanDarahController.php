<?php
declare(strict_types=1);

namespace App\Features\Donor\LokasiPengambilanDarah;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class LokasiPengambilanDarahController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            model: new LokasiPengambilanDarahModel(),
            breadcrumbs: [
                ['title' => 'Donor', 'icon' => 'donor'],
                ['title' => 'Lokasi Pengambilan Darah', 'icon' => 'lokasi_pengambilan_darah'],
            ],
            title: 'Lokasi Pengambilan Darah',
            action: [
                'tambah' => false,
                'audit'  => false,
                'ubah'   => false, 
                'hapus'  => false
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_lokasi_pengambilan', 'ID Lokasi Pengambilan'],
                [SHOW, REQUIRED, I::TEXT, 'nama_lokasi', 'Nama Lokasi'],
            ],
        );
    }   
}