<?php
declare(strict_types=1);

namespace App\Features\TriaseUGD\AlasanKedatangan;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class AlasanKedatanganModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            new AlasanKedatanganDatabase(),
            'REFS',
            'triase_ugd',
            'alasan_kedatangan',
            'id_alasan',
            [
                'id_alasan'     => V::DEFAULT(),
                'nama_alasan'   => V::DEFAULT()
            ],
            [],
        );
    }
}