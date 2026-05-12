<?php
declare(strict_types=1);

namespace App\Features\Donor\StatusKunjungan;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;

final class StatusKunjunganDatabase extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'donor',
            'status_kunjungan',
            [
                'id_status_kunjungan'      => T::ID(10),
                'nama_status_kunjungan'    => T::NAME(20),
            ],
            'id_status_kunjungan',
            ['nama_status_kunjungan'],
            [],
            true,
            'status_kunjungan.csv'
        );
    }
}
