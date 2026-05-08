<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\PengadaanBarang;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class PengadaanBarangModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'BASE',
            'inventori_non_medis',
            'pengadaan_barang',
            'id_pengadaan',
            [
                'id_pengadaan' => V::TODO(),
                'id_pengajuan' => V::TODO(),
                'id_suplier' => V::TODO(),
                'tanggal' => V::TODO(),
                'status' => V::TODO(),
                'catatan' => V::TODO(),
            ],
        );
    }
}
