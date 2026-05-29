<?php
declare(strict_types=1);

namespace App\Features\InventoriDarah\StokDarah;

use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class StokDarahModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            new StokDarahDatabase(),
            [
                'id_stok_darah'       => V::DEFAULT(),
                'no_kantong'          => V::DEFAULT(),
                'tanggal_pengambilan' => V::DEFAULT(),
                'tanggal_kadaluarsa'  => V::DEFAULT(),
            ],
            [
                'id_komponen'       => ['nama_komponen'],
                'id_golongan_darah' => ['nama_golongan_darah'],
                'id_rhesus'         => ['kode_rhesus'],
                'id_sumber_darah'   => ['nama_sumber_darah'],
                'id_status_stok'    => ['nama_status_stok'],
            ],
        );
    }
}
