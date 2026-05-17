<?php
declare(strict_types=1);

namespace App\Features\PenangananDonor\KasusReaktif;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class KasusReaktifModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            new KasusReaktifDatabase(),
            'BASE',
            'penanganan_donor',
            'kasus_reaktif',
            'id_kasus',
            [
                'id_kasus'              => V::DEFAULT(),
                'tanggal_ditetapkan'    => V::DEFAULT()
            ],
            [
                'id_uji_saring'     => [''],
                'id_status_kasus'   => ['nama_status_kasus']
            ],
        );
    }
}