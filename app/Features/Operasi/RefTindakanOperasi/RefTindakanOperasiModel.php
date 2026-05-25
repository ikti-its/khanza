<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefTindakanOperasi;

use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class RefTindakanOperasiModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            new RefTindakanOperasiDatabase(),
            'REFS',
            'operasi',
            'ref_tindakan_operasi',
            'id_tindakan',
            [
                'id_tindakan'   => V::DEFAULT(),
                'kode_tindakan' => V::DEFAULT(),
                'nama_tindakan' => V::DEFAULT(),
                'tarif_kelas_3' => V::DEFAULT(),
                'tarif_kelas_2' => V::DEFAULT(),
                'tarif_kelas_1' => V::DEFAULT(),
                'tarif_vip'     => V::DEFAULT(),
                'tarif_vvip'    => V::DEFAULT(),
            ],
            [],
        );
    }
}
