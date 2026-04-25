<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefPosisiPasien;

use App\Core\ModelTemplate;

final class RefPosisiPasienModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'REFS',
            'operasi',
            'ref_posisi_pasien',
            'id_posisi',
            [
                'id_posisi' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'nama_posisi' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
            ],
        );
    }
}