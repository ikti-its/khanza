<?php
declare(strict_types=1);

namespace App\Features\PenangananDonor\Rujukan;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class RujukanModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            new RujukanDatabase(),
            'BASE',
            'penanganan_donor',
            'rujukan',
            'id_rujukan',
            [
                'id_rujukan'        => V::DEFAULT(),
                'nomor_rujukan'     => V::DEFAULT(),
                'tanggal_rujukan'   => V::DEFAULT()
            ],
            [
                'id_kasus'              => [''],
                'id_fasyankes'          => ['nama_fasyankes', 'kode_pos'],
                'id_petugas_perujuk'    => ['']
            ],
        );
    }
}