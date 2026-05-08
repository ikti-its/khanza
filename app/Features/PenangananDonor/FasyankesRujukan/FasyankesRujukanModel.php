<?php
declare(strict_types=1);

namespace App\Features\PenangananDonor\FasyankesRujukan;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class FasyankesRujukanModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'BASE',
            'penanganan_donor',
            'fasyankes_rujukan',
            'id_fasyankes',
            [
                'id_fasyankes' => V::TODO(),
                'nama_fasyankes' => V::TODO(),
                'id_alamat' => V::TODO(),
                'kode_pos' => V::TODO()
            ],
        );
    }
}