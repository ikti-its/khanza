<?php
declare(strict_types=1);

namespace App\Features\Role\Petugas;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class PetugasModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            new PetugasDatabase(),
            'BASE',
            'role',
            'pasien',
            'id_petugas',
            [
                'id_petugas' => V::DEFAULT(),
                'deskripsi'  => V::DEFAULT(),
            ],
            [
                'id_orang' => ['nik', 'nama', 'tanggal_lahir'],
            ],
        );
    }
}