<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\PengadaanBarang;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class PengadaanBarangModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            new PengadaanBarangDatabase(),
            'BASE',
            'inventori_non_medis',
            'pengadaan_barang',
            'id_pengadaan',
            [
                'id_pengadaan' => V::DEFAULT(),
                'tanggal'      => V::DEFAULT(),
                'status'       => V::DEFAULT(),
                'catatan'      => V::DEFAULT(),
            ],
            [
                'id_pengajuan' => ['tanggal', 'status'],
                'id_suplier'   => ['nama_suplier'],
            ],
        );
    }
}
