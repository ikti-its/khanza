<?php
declare(strict_types=1);

namespace App\Features\Donor\PengambilanDarah;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class PengambilanDarahController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            model: new PengambilanDarahModel(),
            breadcrumbs: [
                ['title' => 'Donor', 'icon' => 'donor'],
                ['title' => 'Pengambilan Darah', 'icon' => 'pengambilan_darah'],
            ],
            title: 'Pengambilan Darah',
            action: [
                A::CREATE,
                A::AUDIT,
                A::UPDATE, 
                A::DELETE,
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_pengambilan_darah', 'ID Pengambilan Darah'],
                [SHOW, REQUIRED, I::TEXT, 'nomor_pengambilan', 'Nomor Pengambilan'],
                [SHOW, REQUIRED, I::INDEX, 'id_kunjungan', 'ID Kunjungan'],
                [SHOW, REQUIRED, I::DATE, 'tanggal_pengambilan', 'Tanggal Pengambilan'],
                [SHOW, REQUIRED, I::INDEX, 'id_shift', 'ID Shift'],
                [HIDE, REQUIRED, I::INDEX, 'id_jenis_donor', 'ID Jenis Donor'],
                [SHOW, REQUIRED, I::INDEX, 'id_lokasi_pengambilan', 'ID Lokasi Pengambilan'],
                [HIDE, REQUIRED, I::INDEX, 'id_petugas', 'ID Petugas'],
            ],
        );
    }   
}