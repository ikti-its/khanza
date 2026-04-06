<?php
declare(strict_types=1);

namespace App\Features\Inventori\Supplier;

use App\Core\ModelTemplate;

class SupplierModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'BASE',
            'inventori',
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
                'alamat' => [
                    'allowed' => true,
                    'rules'   => '',
                    'errors'  => [],
                ]
            ],
        );
    }
}