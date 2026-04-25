<?php
declare(strict_types=1);

namespace App\Features\Laboratorium\PermintaanLabMb;
use App\Core\Model\ModelTemplate;

final class PermintaanLabMbModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            'BASE',
            'laboratorium',
            'permintaan_lab_mb',
            'id_permintaan_mb',
            [
                'id_permintaan_mb' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'id_permintaan_lab' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'id_item_pemeriksaan' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'id_parameter_pemeriksaan' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
            ],
        );
    }
}