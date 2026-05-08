<?php
declare(strict_types=1);

namespace App\Features\LogistikUTD\PengambilanPenunjang;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class PengambilanPenunjangModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'REFS',
            'logistik_utd',
            'pengambilan_penunjang',
            'id_pengambilan_penunjang',
            [
                'id_pengambilan_penunjang' => V::TODO(),
                'id_barang' => V::TODO(),
                'jumlah' => V::TODO(),
                'harga_beli' => V::TODO(),
                'id_petugas_gudang' => V::TODO(),
                'tanggal_pengambilan' => V::TODO(),
                'keterangan' => V::TODO()
            ],
        );
    }
}