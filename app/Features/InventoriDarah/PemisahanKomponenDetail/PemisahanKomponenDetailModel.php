<?php
declare(strict_types=1);

namespace App\Features\InventoriDarah\PemisahanKomponenDetail;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class PemisahanKomponenDetailModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            new PemisahanKomponenDetailDatabase(),
            'BASE',
            'inventori_darah',
            'pemisahan_komponen_detail',
            'id_pemisahan_detail',
            [
                'id_pemisahan_detail'   => V::DEFAULT(),
                'no_kantong'            => V::DEFAULT(),
                'tanggal_kadaluarsa'    => V::DEFAULT()
            ],
            [
                'id_pemisahan'  => ['tanggal_pemisahan'],
                'id_komponen'   => ['nama_komponen']
            ],
        );
    }
}