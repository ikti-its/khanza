<?php
declare(strict_types=1);

namespace App\Features\Darah\KomponenDarah;

use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class KomponenDarahModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            new KomponenDarahDatabase(),
            [
                'id_komponen'       => V::DEFAULT(),
                'kode_komponen'     => V::DEFAULT(),
                'nama_komponen'     => V::DEFAULT(),
                'masa_berlaku_hari' => V::DEFAULT(),
            ],
            [],
        );
    }
}
