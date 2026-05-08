<?php
declare(strict_types=1);

namespace App\Features\Donor\PengambilanDarah;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class PengambilanDarahModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'BASE',
            'donor',
            'pengambilan_darah',
            'id_pengambilan_darah',
            [
                'id_pengambilan_darah' => V::TODO(),
                'nomor_pengambilan' => V::TODO(),
                'id_kunjungan' => V::TODO(),
                'tanggal_pengambilan' => V::TODO(),
                'id_shift' => V::TODO(),
                'id_jenis_donor' => V::TODO(),
                'id_lokasi_pengambilan' => V::TODO(),
                'id_petugas' => V::TODO()
            ],
        );
    }
}