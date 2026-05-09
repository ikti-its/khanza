<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\Satuan;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class SatuanModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            new SatuanDatabase(),
            'REFS',
            'inventori_non_medis',
            'satuan',
            'id_satuan',
            [
                'id_satuan'   => V::DEFAULT(),
                'kode_satuan' => V::DEFAULT(),
                'nama_satuan' => V::DEFAULT(),
            ],
            [],
        );
    }
}