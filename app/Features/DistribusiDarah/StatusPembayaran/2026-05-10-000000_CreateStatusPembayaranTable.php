<?php
declare(strict_types=1);

namespace App\Features\DistribusiDarah\StatusPembayaran;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

final class CreateStatusPembayaranTable extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'distribusi_darah',
            'status_pembayaran',
            [
                'id_status_pembayaran'    => T::ID8(),
                'nama_status_pembayaran'  => T::TEXT(),
            ],
            'id_status_pembayaran',
            'nama_status_pembayaran',
            [],
            true,
            __DIR__ . '/status_pembayaran.csv'
        );
    }
}
