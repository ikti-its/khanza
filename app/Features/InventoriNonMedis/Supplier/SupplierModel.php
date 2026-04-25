<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\Supplier;
use App\Core\Model\ModelTemplate;

final class SupplierModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'BASE',
            'inventori_non_medis',
            'supplier',
            'id_supplier',
            [
                'id_supplier' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'nama_supplier' => [
                    'allowed' => true,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'no_telp' => [
                    'allowed' => true,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'id_alamat' => [
                    'allowed' => true,
                    'rules'   => '',
                    'errors'  => [],
                ],
            ],
        );
    }
}
