<?php
declare(strict_types=1);

namespace App\Features\PenangananDonor\PertanyaanKonseling;

use App\Core\ModelTemplate;

final class PertanyaanKonselingModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'REFS',
            'penanganan_donor',
            'pertanyaan_konseling',
            'id_pertanyaan',
            [
                'id_pertanyaan' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'teks_pertanyaan' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ]
            ],
        );
    }
}