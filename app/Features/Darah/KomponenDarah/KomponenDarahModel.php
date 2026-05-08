<?php
declare(strict_types=1);

namespace App\Features\Darah\KomponenDarah;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class KomponenDarahModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'BASE',
            'darah',
            'komponen_darah',
            'id_komponen',
            [
                'id_komponen' => V::TODO(), 
                'kode_komponen' => V::TODO(),
                'nama_komponen' => V::TODO(),
                'masa_berlaku_hari' => V::TODO()
            ],
        );
    }
}