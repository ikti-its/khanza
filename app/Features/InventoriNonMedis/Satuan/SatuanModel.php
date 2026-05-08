<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\Satuan;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class SatuanModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'REFS',
            'inventori_non_medis',
            'satuan',
            'id_satuan',
            [
                'id_satuan' => V::TODO(),
                'kode_satuan' => V::TODO(),
                'nama_satuan' => V::TODO()
            ],
        );
    }
}