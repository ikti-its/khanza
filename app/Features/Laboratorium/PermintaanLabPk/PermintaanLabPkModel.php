<?php
declare(strict_types=1);

namespace App\Features\Laboratorium\PermintaanLabPk;
use App\Core\Model\ModelTemplate;

final class PermintaanLabPkModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            'BASE',
            'laboratorium',
            'permintaan_lab_pk',
            'id_permintaan_pk',
            [
                'id_permintaan_pk' => [
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