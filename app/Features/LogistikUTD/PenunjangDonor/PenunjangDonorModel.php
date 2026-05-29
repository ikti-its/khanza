<?php
declare(strict_types=1);

namespace App\Features\LogistikUTD\PenunjangDonor;

use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class PenunjangDonorModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            new PenunjangDonorDatabase(),
            [
                'id_penunjang_donor' => V::DEFAULT(),
                'jumlah'             => V::DEFAULT(),
                'harga'              => V::DEFAULT(),
            ],
            [
                'id_pengambilan_darah' => ['nomor_pengambilan'],
                'id_barang'            => ['kode_barang', 'nama_barang'],
            ],
        );
    }
}
