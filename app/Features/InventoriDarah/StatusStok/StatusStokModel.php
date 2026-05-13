<?php
declare(strict_types=1);

namespace App\Features\InventoriDarah\StatusStok;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class StatusStokModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            new StatusStokDatabase(),
            'REFS',
            'inventori_darah',
            'status_stok',
            'id_status_stok',
            [
                'id_status_stok'    => V::DEFAULT(),
                'nama_status_stok'  => V::DEFAULT()
            ],
            [],
        );
    }
}