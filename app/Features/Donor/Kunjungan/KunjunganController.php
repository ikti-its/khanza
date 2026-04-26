<?php
declare(strict_types=1);

namespace App\Features\Donor\Kunjungan;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class KunjunganController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            model: new KunjunganModel(),
            breadcrumbs: [
                ['Donor', 'donor'],
                ['Kunjungan', 'kunjungan'],
            ],
            title: 'Kunjungan',
            action: [
                A::CREATE,
                A::AUDIT,
                A::UPDATE, 
                A::DELETE,
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_kunjungan', 'ID Kunjungan'],
                [SHOW, REQUIRED, I::NUMBER, 'nomor_antrian', 'Nomor Antrian'],
                [SHOW, REQUIRED, I::INDEX, 'id_pendonor', 'ID Pendonor'],
                [SHOW, REQUIRED, I::DATE, 'tanggal_kunjungan', 'Tanggal Kunjungan'],
                [SHOW, REQUIRED, I::SELECT, 'id_status_kunjungan', 'ID Status Kunjungan'],
            ],
        );
    }   
}