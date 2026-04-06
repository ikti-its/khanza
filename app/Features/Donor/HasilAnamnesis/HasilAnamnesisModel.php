<?php
declare(strict_types=1);

namespace App\Features\Donor\HasilAnamnesis;

use App\Core\ModelTemplate;

class HasilAnamnesisModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'REFS',
            'donor',
            'hasil_anamnesis',
            'id_hasil',
            [
                'id_hasil' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'nama_hasil' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ]
            ],
        );
    }
}