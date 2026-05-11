<?php
declare(strict_types=1);

namespace App\Features\Laboratorium\RefStatusPermintaan;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

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
                'id_status' => V::TODO(),
                'nama_status' => V::TODO(),
            ],
        );
    }
}