<?php
declare(strict_types=1);

namespace App\Features\DistribusiDarah\StatusPembayaran;

use App\Core\Database\Template\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;

final class StatusPembayaranDatabase extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'distribusi_darah',
            'status_pembayaran',
            [
                'id_status_pembayaran'    => T::ID(5),
                'nama_status_pembayaran'  => T::NAME(20),
            ],
            'id_status_pembayaran',
            ['nama_status_pembayaran'],
            [],
            true,
            'status_pembayaran.csv'
        );
    }
}
