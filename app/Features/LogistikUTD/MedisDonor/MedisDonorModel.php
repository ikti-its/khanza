<?php
declare(strict_types=1);

namespace App\Features\LogistikUTD\MedisDonor;

use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class MedisDonorModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            new MedisDonorDatabase(),
            'BASE',
            'logistik_utd',
            'medis_donor',
            'id_medis_donor',
            [
                'id_medis_donor' => V::DEFAULT(),
                'jumlah'         => V::DEFAULT(),
                'harga'          => V::DEFAULT(),
            ],
            [
                'id_pengambilan_darah' => ['nomor_pengambilan'],
                'id_barang'            => ['kode_barang', 'nama'],
            ],
        );
    }
}
