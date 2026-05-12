<?php
declare(strict_types=1);

namespace App\Features\Donor\LokasiPengambilanDarah;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class LokasiPengambilanDarahModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            new LokasiPengambilanDarahDatabase(),
            'REFS',
            'donor',
            'lokasi_pengambilan_darah',
            'id_lokasi_pengambilan',
            [
                'id_lokasi_pengambilan' => V::DEFAULT(),
                'nama_lokasi'           => V::DEFAULT()
            ],
            [],
        );
    }
}