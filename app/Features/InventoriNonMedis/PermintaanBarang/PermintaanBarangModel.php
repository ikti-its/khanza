<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\PermintaanBarang;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class PermintaanBarangModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'BASE',
            'inventori_non_medis',
            'permintaan_barang',
            'id_permintaan',
            [
                'id_permintaan' => V::TODO(),
                'id_unit' => V::TODO(),
                'tipe' => V::TODO(),
                'tanggal' => V::TODO(),
                'status' => V::TODO(),
                'catatan' => V::TODO(),
            ],
        );
    }
}
