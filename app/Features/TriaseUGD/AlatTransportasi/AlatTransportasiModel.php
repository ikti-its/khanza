<?php
declare(strict_types=1);

namespace App\Features\TriaseUGD\AlatTransportasi;

use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class AlatTransportasiModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            new AlatTransportasiDatabase(),
            [
                'id_transportasi'   => V::DEFAULT(),
                'nama_transportasi' => V::DEFAULT(),
            ],
            [],
        );
    }
}
