<?php
declare(strict_types=1);

namespace App\Features\PenangananDonor\KasusReaktifDetail;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

class CreateKasusReaktifDetailTable extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'penanganan_donor',
            'kasus_reaktif_detail',
            [
                'id_kasus_detail'           => T::ID32(),
                'id_kasus'                  => T::INT32(),
                'id_uji_saring_detail'      => T::INT32(),
            ],
            ['id_kasus_detail'],
            [['id_uji_saring_detail']],
            [
                [['id_kasus'], 'kasus_reaktif', ['id_kasus'], 'CASCADE', 'CASCADE'],
                [['id_uji_saring_detail'], 'uji_darah.hasil_uji_saring_detail', ['id_uji_saring_detail'], 'CASCADE', 'CASCADE'],
            ],
        );
    }
}
