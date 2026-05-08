<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\PenerimaanBarang;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class PenerimaanBarangModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            'BASE',
            'inventori_non_medis',
            'penerimaan_barang',
            'id_penerimaan',
            [
                'id_penerimaan' => V::TODO(),
                'id_pengadaan' => V::TODO(),
                'tanggal' => V::TODO(),
                'status' => V::TODO(),
                'catatan' => V::TODO(),
            ],
        );
    }
}
