<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefObatBebas;

use App\Core\ModelTemplate;

final class RefObatBebasModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'REFS',
            'operasi',
            'ref_obat_bebas',
            'id_obat_bebas',
            [
                'id_obat_bebas' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'nama_kategori' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
            ],
        );
    }
}