<?php
declare(strict_types=1);

namespace App\Features\PenangananDonor\FasyankesRujukan;

use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class FasyankesRujukanModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            new FasyankesRujukanDatabase(),
            'BASE',
            'penanganan_donor',
            'fasyankes_rujukan',
            'id_fasyankes',
            [
                'id_fasyankes'   => V::DEFAULT(),
                'nama_fasyankes' => V::DEFAULT(),
                'kode_pos'       => V::DEFAULT(),
            ],
            [
                'id_alamat' => ['alamat_lengkap'],
            ],
        );
    }
}
