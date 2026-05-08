<?php
declare(strict_types=1);

namespace App\Features\LogistikUTD\PengambilanMedis;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class PengambilanMedisModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'REFS',
            'logistik_utd',
            'pengambilan_medis',
            'id_pengambilan_medis',
            [
                'id_pengambilan_medis' => V::TODO(),
                'id_barang' => V::TODO(),
                'jumlah' => V::TODO(),
                'harga_beli' => V::TODO(),
                'nama_bangsal' => V::TODO(),
                'tanggal_pengambilan' => V::TODO(),
                'keterangan' => V::TODO(),
                'nomor_batch' => V::TODO(),
                'nomor_faktur' => V::TODO()
            ],
        );
    }
}