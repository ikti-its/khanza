<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\PermintaanBarang;

use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class PermintaanBarangModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            new PermintaanBarangDatabase(),
            [
                'id_permintaan'               => V::DEFAULT(),
                'tanggal'                     => V::DEFAULT(),
                'id_unit'                     => V::DEFAULT(),
                'id_status_permintaan_barang' => V::DEFAULT(),
                'catatan'                     => V::DEFAULT(),
            ],
            [
                'id_unit'                     => ['nama_unit'],
                'id_status_permintaan_barang' => ['nama_status_permintaan_barang'],
            ],
        );
    }
}
