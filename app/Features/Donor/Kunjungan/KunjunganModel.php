<?php
declare(strict_types=1);

namespace App\Features\Donor\Kunjungan;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class KunjunganModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'BASE',
            'donor',
            'kunjungan',
            'id_kunjungan',
            [
                'id_kunjungan' => V::TODO(),
                'id_pendonor' => V::TODO(),
                'tanggal_kunjungan' => V::TODO(),
                'nomor_antrian' => V::TODO(),
                'id_status_kunjungan' => V::TODO()
            ],
        );
    }
}