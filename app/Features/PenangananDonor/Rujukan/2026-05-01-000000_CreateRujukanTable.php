<?php
declare(strict_types=1);

namespace App\Features\PenangananDonor\Rujukan;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

final class CreateRujukanTable extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'penanganan_donor',
            'rujukan',
            [
                'id_rujukan'              => T::ID32(),
                'id_kasus'                => T::INT32(),
                'nomor_surat'             => T::TEXT(),
                'tanggal_rujukan'         => T::DATE(),
                'id_fasyankes'            => T::INT16(),
            ],
            'id_rujukan',
            'nomor_surat',
            [
                ['id_kasus', 'kasus_reaktif', 'id_kasus'],
                ['id_fasyankes', 'fasyankes_rujukan', 'id_fasyankes'],
            ],
        );
    }
}
