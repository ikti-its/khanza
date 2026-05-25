<?php
declare(strict_types=1);

namespace App\Features\LogistikUTD\PenunjangPemisahan;

use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class PenunjangPemisahanModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            new PenunjangPemisahanDatabase(),
            'BASE',
            'logistik_utd',
            'penunjang_pemisahan',
            'id_penunjang_pemisahan',
            [
                'id_penunjang_pemisahan' => V::DEFAULT(),
                'jumlah'                 => V::DEFAULT(),
                'harga'                  => V::DEFAULT(),
            ],
            [
                'id_pemisahan' => [''],
                'id_barang'    => ['kode_barang', 'nama_barang'],
            ],
        );
    }
}
