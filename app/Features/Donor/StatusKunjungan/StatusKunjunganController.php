<?php
declare(strict_types=1);

namespace App\Features\Donor\StatusKunjungan;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class StatusKunjunganController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            new StatusKunjunganModel(),
            [
                ['Donor', 'donor'],
                ['Status Kunjungan', 'status_kunjungan'],
            ],
            'Status Kunjungan',
            [
                // A::CREATE,
                // A::AUDIT,
                // A::UPDATE, 
                // A::DELETE,
            ],
            [
                [HIDE, OPTIONAL, I::INDEX, 'id_status_kunjungan', 'ID Status Kunjungan'],
                [SHOW, REQUIRED, I::TEXT, 'nama_status_kunjungan', 'Nama Status Kunjungan'],
            ],
        );
    }   
}