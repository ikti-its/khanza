<?php
declare(strict_types=1);

namespace App\Features\LogistikUTD\PengambilanMedis;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class PengambilanMedisModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            new PengambilanMedisDatabase(),
            'REFS',
            'logistik_utd',
            'pengambilan_medis',
            'id_pengambilan_medis',
            [
                'id_pengambilan_medis'  => V::DEFAULT(),
                'jumlah'                => V::DEFAULT(),
                'harga_beli'            => V::DEFAULT(),
                'nama_bangsal'          => V::DEFAULT(),
                'tanggal_pengambilan'   => V::DEFAULT(),
                'keterangan'            => V::DEFAULT(),
                'nomor_batch'           => V::DEFAULT(),
                'nomor_faktur'          => V::DEFAULT()
            ],
            [
                'id_barang' => ['kode_barang', 'nama']
            ],
        );
    }
}