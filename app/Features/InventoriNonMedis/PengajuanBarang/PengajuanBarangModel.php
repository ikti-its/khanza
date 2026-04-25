<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\PengajuanBarang;

use App\Core\ModelTemplate;

final class PengajuanBarangModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'BASE',
            'inventori_non_medis',
            'pengajuan_barang',
            'id_pengajuan',
            [
                'id_pengajuan' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'id_permintaan' => [
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
                'catatan_atasan' => [
                    'allowed' => true,
                    'rules'   => '',
                    'errors'  => [],
                ],
            ],
        );
    }
}
