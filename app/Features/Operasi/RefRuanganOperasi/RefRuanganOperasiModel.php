<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefRuanganOperasi;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class RefRuanganOperasiModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            new RefRuanganOperasiDatabase(),
            'REFS',
            'operasi',
            'ref_ruangan_operasi',
            'id_ruangan',
            [
                'id_ruangan'   => V::DEFAULT(),
                'kode_ruangan' => V::DEFAULT(),
                'nama_ruangan' => V::DEFAULT(),
            ],
            []
        );
    }
}