<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\PengajuanBarang;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class PengajuanBarangModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            new PengajuanBarangDatabase(),
            'BASE',
            'inventori_non_medis',
            'pengajuan_barang',
            'id_pengajuan',
            [
                'id_pengajuan'   => V::DEFAULT(),
                'tanggal'        => V::TODO(),
                'status'         => V::TODO(),
                'catatan'        => V::TODO(),
                'catatan_atasan' => V::TODO(),
            ],
            [],
        );
    }
}
