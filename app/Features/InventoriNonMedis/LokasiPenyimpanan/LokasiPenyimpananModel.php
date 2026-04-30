<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\LokasiPenyimpanan;
use App\Core\Model\ModelTemplate;

final class LokasiPenyimpananModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'REFS',
            'inventori_non_medis',
            'lokasi_penyimpanan',
            'id_lokasi_penyimpanan',
            [
                'id_lokasi_penyimpanan' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'nama_lokasi_penyimpanan' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ]
            ],
        );
    }
}