<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\StokOpnameDetail;
use App\Core\Model\ModelTemplate;

final class StokOpnameDetailModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'BASE',
            'inventori_non_medis',
            'stok_opname_detail',
            'id_detail',
            [
                'id_detail' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'id_opname' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'id_barang' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'stok_sistem' => [
                    'allowed' => true,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'stok_fisik' => [
                    'allowed' => true,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'selisih' => [
                    'allowed' => true,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'keterangan' => [
                    'allowed' => true,
                    'rules'   => '',
                    'errors'  => [],
                ],
            ],
        );
    }
}
