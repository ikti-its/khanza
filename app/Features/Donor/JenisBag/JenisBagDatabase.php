<?php
declare(strict_types=1);

namespace App\Features\Donor\JenisBag;

use App\Core\Database\Template\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;

final class JenisBagDatabase extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'donor',
            'jenis_bag',
            [
                'id_jenis_bag'     => T::ID(4),
                'kode_jenis_bag'   => T::CODE(2),
                'nama_jenis_bag'   => T::NAME(20),
            ],
            'id_jenis_bag',
            ['kode_jenis_bag', 'nama_jenis_bag'],
            [],
            true,
            'jenis_bag.csv'
        );
    }
}
