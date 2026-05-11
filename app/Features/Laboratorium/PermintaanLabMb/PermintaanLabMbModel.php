<?php
declare(strict_types=1);

namespace App\Features\Laboratorium\PermintaanLabMb;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

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
                'id_permintaan_mb' => V::TODO(),
                'id_permintaan_lab' => V::TODO(),
                'id_item_pemeriksaan' => V::TODO(),
                'id_parameter_pemeriksaan' => V::TODO(),
            ],
        );
    }
}