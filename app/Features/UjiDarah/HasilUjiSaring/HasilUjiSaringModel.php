<?php
declare(strict_types=1);

namespace App\Features\UjiDarah\HasilUjiSaring;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class HasilUjiSaringModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'BASE',
            'uji_darah',
            'hasil_uji_saring',
            'id_uji_saring',
            [
                'id_uji_saring' => V::TODO(),
                'id_bag' => V::TODO(),
                'id_metode_uji' => V::TODO(),
                'tanggal_uji' => V::TODO(),
                'id_petugas' => V::TODO()
            ],
        );
    }
}