<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\Suplier;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class SuplierModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'BASE',
            'inventori_non_medis',
            'suplier',
            'id_suplier',
            [
                'id_suplier' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'nama_suplier' => [
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
