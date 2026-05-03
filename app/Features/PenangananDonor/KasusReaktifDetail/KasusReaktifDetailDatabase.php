<?php
declare(strict_types=1);

namespace App\Features\PenangananDonor\KasusReaktifDetail;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

final class KasusReaktifDetailDatabase extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'penanganan_donor',
            'kasus_reaktif_detail',
            [
                'id_kasus_detail'           => T::ID32(10_000_000),
                'id_kasus'                  => T::FK_AUTO(),
                'id_uji_saring_detail'      => T::FK_AUTO(),
            ],
            'id_kasus_detail',
            ['id_uji_saring_detail'],
            [
                [
                    'id_kasus', 
                    \App\Features\PenangananDonor\KasusReaktif\KasusReaktifDatabase::class, 
                    'id_kasus'
                ],
                [
                    'id_uji_saring_detail', 
                    \App\Features\UjiDarah\HasilUjiSaringDetail\HasilUjiSaringDetailDatabase::class, 
                    'id_uji_saring_detail'
                ],
            ],
            false,
            'kasus_reaktif_detail.csv'
        );
    }
}
