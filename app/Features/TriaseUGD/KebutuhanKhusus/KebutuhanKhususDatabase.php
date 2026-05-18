<?php
declare(strict_types=1);

namespace App\Features\TriaseUGD\KebutuhanKhusus;
use App\Core\Database\Template\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;

final class KebutuhanKhususDatabase extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'triase_ugd',
            'kebutuhan_khusus',
            [
                'id_kebutuhan'   => T::ID(5),
                'nama_kebutuhan' => T::NAME(20),
            ],
            'id_kebutuhan',
            ['nama_kebutuhan'],
            [],
            true,
            'kebutuhan_khusus.csv'
        );
    }
}
