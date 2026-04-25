<?php
declare(strict_types=1);

namespace App\Features\Operasi\CatatanPaskaOperasi;
use App\Core\Model\ModelTemplate;

final class CatatanPaskaOperasiModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            'BASE',
            'operasi',
            'catatan_paska_operasi',
            'id_catatan_paska',
            [
                'id_catatan_paska' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'nomor_reg' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'kode_dokter_bedah' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'waktu_penilaian' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'instruksi_rawat' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'instruksi_cairan' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'instruksi_antibiotik' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'instruksi_analgetik' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'instruksi_medikamentosa' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'instruksi_diet' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'instruksi_penunjang' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'instruksi_transfusi' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'instruksi_lainnya' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
            ],
        );
    }
}