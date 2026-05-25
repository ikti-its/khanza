<?php
declare(strict_types=1);

namespace App\Features\UjiDarah\HasilDiagnostikDetail;

use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class HasilDiagnostikDetailModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            new HasilDiagnostikDetailDatabase(),
            'BASE',
            'uji_darah',
            'hasil_diagnostik_detail',
            'id_diagnostik_detail',
            [
                'id_diagnostik_detail' => V::DEFAULT(),
            ],
            [
                'id_diagnostik'       => ['tanggal_hasil', 'dokter_pemeriksa'],
                'id_parameter_uji'    => ['nama_parameter'],
                'id_nilai_diagnostik' => ['nama_nilai_diagnostik'],
            ],
        );
    }
}
