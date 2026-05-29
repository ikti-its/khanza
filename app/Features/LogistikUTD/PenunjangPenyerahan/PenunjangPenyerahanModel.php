<?php
declare(strict_types=1);

namespace App\Features\LogistikUTD\PenunjangPenyerahan;

use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class PenunjangPenyerahanModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            new PenunjangPenyerahanDatabase(),
            [
                'id_penunjang_penyerahan' => V::DEFAULT(),
                'jumlah'                  => V::DEFAULT(),
                'harga'                   => V::DEFAULT(),
            ],
            [
                'id_penyerahan' => ['no_penyerahan'],
                'id_barang'     => ['kode_barang', 'nama_barang'],
            ],
        );
    }
}
