<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\PengadaanBarang;

use App\Core\ModelTemplate;

final class PengadaanBarangModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'BASE',
            'inventori_non_medis',
            'pengadaan_barang',
            'id_pengadaan',
            [
                'id_pengadaan' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'id_pengajuan' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'id_supplier' => [
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
