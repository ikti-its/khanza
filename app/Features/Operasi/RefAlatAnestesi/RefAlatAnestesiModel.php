<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefAlatAnestesi;
use App\Core\Model\ModelTemplate;

final class RefAlatAnestesiModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'REFS',
            'operasi',
            'ref_alat_anestesi',
            'id_alat',
            [
                'id_alat' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'nama_alat' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
            ],
        );
    }
}