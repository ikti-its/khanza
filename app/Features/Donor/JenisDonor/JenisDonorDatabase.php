<?php
declare(strict_types=1);

namespace App\Features\Donor\JenisDonor;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;

final class JenisDonorDatabase extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'donor',
            'jenis_donor',
            [
                'id_jenis_donor'      => T::ID(4),
                'kode_jenis_donor'    => T::CODE(3),
                'nama_jenis_donor'    => T::NAME(30),
            ],
            'id_jenis_donor',
            ['kode_jenis_donor', 'nama_jenis_donor'],
            [],
            true,
            'jenis_donor.csv'
        );
    }
}
