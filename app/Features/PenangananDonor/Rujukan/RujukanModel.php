<?php
declare(strict_types=1);

namespace App\Features\PenangananDonor\Rujukan;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class RujukanModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'BASE',
            'penanganan_donor',
            'rujukan',
            'id_rujukan',
            [
                'id_rujukan' => V::TODO(),
                'id_kasus' => V::TODO(),
                'nomor_surat' => V::TODO(),
                'tanggal_rujukan' => V::TODO(),
                'id_fasyankes' => V::TODO()
            ],
        );
    }
}