<?php
declare(strict_types=1);

namespace App\Features\Laboratorium\RefStatusPermintaan;

use App\Core\ModelTemplate;

final class RefStatusPermintaanModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            'REFS',
            'laboratorium',
            'ref_status_permintaan',
            'id_status',
            [
                'id_status' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'nama_status' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
            ],
        );
    }
}