<?php
declare(strict_types=1);

namespace App\Features\DistribusiDarah\PermintaanDarah;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class PermintaanDarahController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            model: new PermintaanDarahModel(),
            breadcrumbs: [
                ['title' => 'Pelayanan Darah', 'icon' => 'pelayanan_darah'],
                ['title' => 'Permintaan Darah', 'icon' => 'permintaan_darah'],
            ],
            title: 'Permintaan Darah',
            action: [
                A::CREATE,
                A::AUDIT,
                A::UPDATE, 
                A::DELETE,
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_permintaan', 'ID Permintaan'],
                [SHOW, REQUIRED, I::TEXT, 'no_rawat', 'No. Rawat'],
                [SHOW, REQUIRED, I::TEXT, 'kode_dokter_pengirim', 'Kode Dokter Pengirim'],
                [SHOW, REQUIRED, I::DTIME, 'tanggal_permintaan', 'Tanggal Permintaan'],
                [SHOW, REQUIRED, I::SELECT, 'id_status_permintaan', 'ID Status Permintaan'],
            ],
        );
    }   
}