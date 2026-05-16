<?php
declare(strict_types=1);

namespace App\Features\UjiDarah\NilaiDiagnostik;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class NilaiDiagnostikModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            new NilaiDiagnostikDatabase(),
            'REFS',
            'uji_darah',
            'nilai_diagnostik',
            'id_nilai_diagnostik',
            [
                'id_nilai_diagnostik'   => V::DEFAULT(),
                'nama_nilai_diagnostik' => V::DEFAULT()
            ],
            [],
        );
    }
}