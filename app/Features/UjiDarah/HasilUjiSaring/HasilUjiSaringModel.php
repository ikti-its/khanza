<?php
declare(strict_types=1);

namespace App\Features\UjiDarah\HasilUjiSaring;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class HasilUjiSaringModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            new HasilUjiSaringDatabase(),
            'BASE',
            'uji_darah',
            'hasil_uji_saring',
            'id_uji_saring',
            [
                'id_uji_saring' => V::DEFAULT(),
                'tanggal_uji'   => V::DEFAULT(),
                'hbsag'         => V::DEFAULT(),
                'hcv'           => V::DEFAULT(),
                'hiv'           => V::DEFAULT(),
                'sifilis'       => V::DEFAULT(),
                'malaria'       => V::DEFAULT()
            ],
            [
                'id_bag'        => ['no_bag'],
                'id_metode_uji' => ['nama_metode'],
                'id_petugas'    => ['']
            ],
        );
    }
}