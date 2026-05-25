<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\Suplier;

use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class SuplierModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            new SuplierDatabase(),
            'BASE',
            'inventori_non_medis',
            'suplier',
            'id_suplier',
            [
                'id_suplier'   => V::DEFAULT(),
                'nama_suplier' => V::DEFAULT(),
                'no_telp'      => V::DEFAULT(),
            ],
            [
                'id_alamat' => ['alamat_lengkap'],
            ],
        );
    }
}
