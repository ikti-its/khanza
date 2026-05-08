<?php
declare(strict_types=1);

namespace App\Features\DistribusiDarah\PermintaanDarah;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class PermintaanDarahModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'BASE',
            'distribusi_darah',
            'permintaan_darah',
            'id_permintaan',
            [
                'id_permintaan' => V::TODO(),
                'no_rawat' => V::TODO(),
                'kode_dokter_pengirim' => V::TODO(),
                'tanggal_permintaan' => V::TODO(),
                'id_status_permintaan' => V::TODO()
            ],
        );
    }
}