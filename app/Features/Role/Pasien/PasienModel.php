<?php
declare(strict_types=1);

namespace App\Features\Role\Pasien;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class PasienModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            new PasienDatabase(),
            'BASE',
            'role',
            'pasien',
            'id_pasien',
            [
                'id_pasien' => V::DEFAULT(),
                'nomor_rm'  => V::DEFAULT(),
            ],
            [
                'id_orang' => ['nik', 'nama', 'tanggal_lahir'],
            ],
        );
    }
}