<?php
declare(strict_types=1);

namespace App\Features\TriaseUGD\KebutuhanKhusus;

use App\Core\Database\Template;
use App\Core\Database\Type as T;

class CreateKebutuhanKhususTable extends Template
{
    public function __construct(){
        parent::__construct(
            'triase_ugd',
            'kebutuhan_khusus',
            [
                'id_kebutuhan'          => T::ID8(),
                'nama_kebutuhan'        => T::TEXT(),
            ],
            ['id_kebutuhan'],
            [['nama_kebutuhan']],
            [],
            [],
            true,
            __DIR__ . '/kebutuhan_khusus.csv'
        );
    }
}
