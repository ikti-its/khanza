<?php
declare(strict_types=1);

namespace App\Features\InventoriDarah\JenisBag;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class JenisBagModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'REFS',
            'inventori_darah',
            'jenis_bag',
            'id_jenis_bag',
            [
                'id_jenis_bag' => V::TODO(),
                'kode_jenis_bag' => V::TODO(),
                'nama_jenis_bag' => V::TODO()
            ],
        );
    }
}