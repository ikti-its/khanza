<?php
declare(strict_types=1);

namespace App\Features\PenangananDonor\PilihanJawaban;

use App\Core\ModelTemplate;

class PilihanJawabanModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'REFS',
            'penanganan_donor',
            'pilihan_jawaban',
            'id_pilihan',
            [
                'id_pilihan' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'nama_pilihan' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ]
            ],
        );
    }
}