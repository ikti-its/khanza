<?php
declare(strict_types=1);

namespace App\Features\Donor\SkriningDonor;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class SkriningDonorModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'BASE',
            'donor',
            'skrining_donor',
            'id_skrining',
            [
                'id_skrining' => V::TODO(),
                'id_kunjungan' => V::TODO(),
                'sistolik' => V::TODO(),
                'diastolik' => V::TODO(),
                'berat_badan' => V::TODO(),
                'kadar_hemoglobin' => V::TODO(),
                'suhu_tubuh' => V::TODO(),
                'id_hasil_anamnesis' => V::TODO()
            ],
        );
    }
}