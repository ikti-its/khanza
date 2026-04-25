<?php
declare(strict_types=1);

namespace App\Features\PenangananDonor\JawabanKonseling;

use App\Core\ModelTemplate;

final class JawabanKonselingModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'BASE',
            'penanganan_donor',
            'jawaban_konseling',
            'id_jawaban',
            [
                'id_jawaban' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'id_konseling' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'id_pertanyaan' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'id_pilihan' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ]
            ],
        );
    }
}