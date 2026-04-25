<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\StokOpname;
use App\Core\Model\ModelTemplate;

final class StokOpnameModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'BASE',
            'inventori_non_medis',
            'stok_opname',
            'id_opname',
            [
                'id_opname' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'tanggal' => [
                    'allowed' => true,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'status' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'catatan' => [
                    'allowed' => true,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'catatan_atasan' => [
                    'allowed' => true,
                    'rules'   => '',
                    'errors'  => [],
                ],
            ],
        );
    }
}
