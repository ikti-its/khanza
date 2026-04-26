<?php
declare(strict_types=1);

namespace App\Features\DistribusiDarah\StatusPembayaran;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class StatusPembayaranController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            new StatusPembayaranModel(),
            [
                ['Pelayanan Darah', 'pelayanan_darah'],
                ['Status Pembayaran', 'status_pembayaran'],
            ],
            'Status Pembayaran',
            [
                // A::CREATE,
                // A::AUDIT,
                // A::UPDATE, 
                // A::DELETE,
            ],
            [
                [HIDE, OPTIONAL, I::INDEX, 'id_status_pembayaran', 'ID Status Pembayaran'],
                [SHOW, REQUIRED, I::TEXT, 'nama_status_pembayaran', 'Nama Status Pembayaran'],
            ],
        );
    }   
}