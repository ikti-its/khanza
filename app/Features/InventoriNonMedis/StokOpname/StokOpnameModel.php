<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\StokOpname;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class StokOpnameModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'BASE',
            'inventori_non_medis',
            'stok_opname',
            'id_opname',
            [
                'id_opname' => V::TODO(),
                'tanggal' => V::TODO(),
                'status' => V::TODO(),
                'catatan' => V::TODO(),
                'catatan_atasan' => V::TODO(),
            ],
        );
    }
}
