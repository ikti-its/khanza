<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\PenerimaanBarang;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class PenerimaanBarangModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            'BASE',
            'inventori_non_medis',
            'penerimaan_barang',
            'id_penerimaan',
            [
                'id_penerimaan' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'id_pengadaan' => [
                    'allowed' => true,
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
            ],
        );
    }
}
