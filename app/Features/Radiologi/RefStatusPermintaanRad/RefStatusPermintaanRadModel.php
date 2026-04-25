<?php
declare(strict_types=1);

namespace App\Features\Radiologi\RefStatusPermintaanRad;
use App\Core\Model\ModelTemplate;

final class RefStatusPermintaanRadModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            'REFS',
            'radiologi',
            'ref_status_permintaan_rad',
            'id_status',
            [
                'id_status' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'nama_status' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
            ],
        );
    }
}