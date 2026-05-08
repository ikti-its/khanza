<?php
declare(strict_types=1);

namespace App\Features\UjiDarah\HasilDiagnostik;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class HasilDiagnostikModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'BASE',
            'uji_darah',
            'hasil_diagnostik',
            'id_diagnostik',
            [
                'id_diagnostik' => V::TODO(),
                'id_rujukan' => V::TODO(),
                'tanggal_hasil' => V::TODO(),
                'dokter_pemeriksa' => V::TODO()
            ],
        );
    }
}