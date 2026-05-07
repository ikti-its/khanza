<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\PenerimaanBarangDetail;
use App\Core\Model\ModelTemplate;

final class PenerimaanBarangDetailModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            'BASE',
            'inventori_non_medis',
            'penerimaan_barang_detail',
            'id_detail',
            [
                'id_detail' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'id_penerimaan' => [
                    'allowed' => true,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'id_barang' => [
                    'allowed' => true,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'qty_diterima' => [
                    'allowed' => true,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'harga_satuan' => [
                    'allowed' => true,
                    'rules'   => '',
                    'errors'  => [],
                ],
            ],
        );
    }
}
