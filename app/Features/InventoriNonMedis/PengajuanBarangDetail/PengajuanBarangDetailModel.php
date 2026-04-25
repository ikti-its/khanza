<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\PengajuanBarangDetail;

use App\Core\ModelTemplate;

final class PengajuanBarangDetailModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'BASE',
            'inventori_non_medis',
            'pengajuan_barang_detail',
            'id_detail',
            [
                'id_detail' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'id_pengajuan' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'id_barang' => [
                    'allowed' => true,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'nama_barang_baru' => [
                    'allowed' => true,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'qty' => [
                    'allowed' => true,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'harga_estimasi' => [
                    'allowed' => true,
                    'rules'   => '',
                    'errors'  => [],
                ],
            ],
        );
    }
}
