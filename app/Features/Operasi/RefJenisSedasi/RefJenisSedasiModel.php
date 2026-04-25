<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefJenisSedasi;
use App\Core\Model\ModelTemplate;

final class RefJenisSedasiModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'REFS',
            'operasi',
            'ref_jenis_sedasi',
            'id_jenis_sedasi',
            [
                'id_jenis_sedasi' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'nama_sedasi' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
            ],
        );
    }
}