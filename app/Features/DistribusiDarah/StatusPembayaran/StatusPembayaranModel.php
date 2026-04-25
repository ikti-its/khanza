<?php
declare(strict_types=1);

namespace App\Features\DistribusiDarah\StatusPembayaran;

use App\Core\ModelTemplate;

final class StatusPembayaranModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'REFS',
            'distribusi_darah',
            'status_pembayaran',
            'id_status_pembayaran',
            [
                'id_status_pembayaran' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'nama_status_pembayaran' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ]
            ],
        );
    }
}