<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefRuanganOperasi;
use App\Core\Model\ModelTemplate;

final class RefRuanganOperasiModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'REFS',
            'operasi',
            'ref_ruangan_operasi',
            'id_ruangan',
            [
                'id_ruangan' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'kode_ruangan' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'nama_ruangan' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
            ],
        );
    }
}