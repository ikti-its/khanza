<?php
declare(strict_types=1);

namespace App\Features\TriaseUGD\DataTriaseDetail;

use App\Core\Database\Template;
use App\Core\Database\Type as T;

class CreateDataTriaseDetailTable extends Template
{
    public function __construct(){
        parent::__construct(
            'triase_ugd',
            'data_triase_detail',
            [
                'id_triase_detail'          => T::ID32(),
                'id_triase'                 => T::INT32(),
                'id_skala'                  => T::INT16(),
            ],
            ['id_triase_detail'],
            [['id_triase', 'id_skala']],
            [
                [['id_triase'], 'data_triase', ['id_triase'], 'CASCADE', 'CASCADE'],
                [['id_skala'], 'triase_skala', ['id_skala'], 'CASCADE', 'CASCADE'],
            ],
            [],
        );
    }
}
