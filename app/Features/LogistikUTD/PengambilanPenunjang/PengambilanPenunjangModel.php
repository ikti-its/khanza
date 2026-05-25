<?php
declare(strict_types=1);

namespace App\Features\LogistikUTD\PengambilanPenunjang;

use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class PengambilanPenunjangModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            new PengambilanPenunjangDatabase(),
            'REFS',
            'logistik_utd',
            'pengambilan_penunjang',
            'id_pengambilan_penunjang',
            [
                'id_pengambilan_penunjang' => V::DEFAULT(),
                'jumlah'                   => V::DEFAULT(),
                'harga_beli'               => V::DEFAULT(),
                'tanggal_pengambilan'      => V::DEFAULT(),
                'keterangan'               => V::DEFAULT(),
            ],
            [
                'id_barang'         => ['kode_barang', 'nama_barang'],
                'id_petugas_gudang' => [''],
            ],
        );
    }
}
