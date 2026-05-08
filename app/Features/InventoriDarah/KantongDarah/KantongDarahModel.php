<?php
declare(strict_types=1);

namespace App\Features\InventoriDarah\KantongDarah;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class KantongDarahModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'BASE',
            'inventori_darah',
            'kantong_darah',
            'id_bag',
            [
                'id_bag' => V::TODO(),
                'id_pengambilan_darah' => V::TODO(),
                'no_bag' => V::TODO(),
                'id_jenis_bag' => V::TODO()
            ],
        );
    }
}