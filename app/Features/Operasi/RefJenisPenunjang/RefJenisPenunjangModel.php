<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefJenisPenunjang;
use App\Core\Model\ModelTemplate;

final class RefJenisPenunjangModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'REFS',
            'operasi',
            'ref_jenis_penunjang',
            'id_jenis_penunjang',
            [
                'id_jenis_penunjang' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'nama_jenis' => [
                    'allowed' => true,
                    'rules'   => '',
                    'errors'  => [],
                ],
            ],
        );
    }
}