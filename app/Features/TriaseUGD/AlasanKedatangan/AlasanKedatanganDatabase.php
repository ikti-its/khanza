<?php
declare(strict_types=1);

namespace App\Features\TriaseUGD\AlasanKedatangan;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;

final class AlasanKedatanganDatabase extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'triase_ugd',
            'alasan_kedatangan',
            [
                'id_alasan'   => T::ID(10),
                'nama_alasan' => T::NAME(20),
            ],
            'id_alasan',
            ['nama_alasan'],
            [],
            true,
            'alasan_kedatangan.csv'
        );
    }
}
