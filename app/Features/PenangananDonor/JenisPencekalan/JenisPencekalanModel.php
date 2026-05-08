<?php
declare(strict_types=1);

namespace App\Features\PenangananDonor\JenisPencekalan;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class JenisPencekalanModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'REFS',
            'penanganan_donor',
            'jenis_pencekalan',
            'id_jenis_pencekalan',
            [
                'id_jenis_pencekalan' => V::TODO(),
                'nama_jenis_pencekalan' => V::TODO()
            ],
        );
    }
}