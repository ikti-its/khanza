<?php
declare(strict_types=1);

namespace App\Features\PenangananDonor\KasusReaktif;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class KasusReaktifModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'BASE',
            'penanganan_donor',
            'kasus_reaktif',
            'id_kasus',
            [
                'id_kasus' => V::TODO(),
                'id_kunjungan' => V::TODO(),
                'id_uji_saring' => V::TODO(),
                'tanggal_ditetapkan' => V::TODO(),
                'id_status_kasus' => V::TODO()
            ],
        );
    }
}