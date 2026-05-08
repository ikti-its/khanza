<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefObatBebas;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class RefObatBebasModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'REFS',
            'operasi',
            'ref_obat_bebas',
            'id_obat_bebas',
            [
                'id_obat_bebas' => V::TODO(),
                'nama_kategori' => V::TODO(),
            ],
        );
    }
}