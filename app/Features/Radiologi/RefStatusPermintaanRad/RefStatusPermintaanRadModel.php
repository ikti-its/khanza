<?php
declare(strict_types=1);

namespace App\Features\Radiologi\RefStatusPermintaanRad;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

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
                'id_status' => V::TODO(),
                'nama_status' => V::TODO(),
            ],
        );
    }
}