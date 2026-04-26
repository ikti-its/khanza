<?php
declare(strict_types=1);

namespace App\Features\Donor\LokasiPengambilanDarah;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class LokasiPengambilanDarahController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            model: new LokasiPengambilanDarahModel(),
            breadcrumbs: [
                ['Donor', 'donor'],
                ['Lokasi Pengambilan Darah', 'lokasi_pengambilan_darah'],
            ],
            title: 'Lokasi Pengambilan Darah',
            action: [
                // A::CREATE,
                // A::AUDIT,
                // A::UPDATE, 
                // A::DELETE,
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_lokasi_pengambilan', 'ID Lokasi Pengambilan'],
                [SHOW, REQUIRED, I::TEXT, 'nama_lokasi', 'Nama Lokasi'],
            ],
        );
    }   
}