<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefPosisiPasien;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class RefPosisiPasienModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'REFS',
            'operasi',
            'ref_posisi_pasien',
            'id_posisi',
            [
                'id_posisi' => V::TODO(),
                'nama_posisi' => V::TODO(),
            ],
        );
    }
}