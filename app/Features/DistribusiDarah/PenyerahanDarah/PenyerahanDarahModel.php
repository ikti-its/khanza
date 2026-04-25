<?php
declare(strict_types=1);

namespace App\Features\DistribusiDarah\PenyerahanDarah;
use App\Core\Model\ModelTemplate;

final class PenyerahanDarahModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'BASE',
            'distribusi_darah',
            'penyerahan_darah',
            'id_penyerahan',
            [
                'id_penyerahan' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'id_permintaan' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'no_penyerahan' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'tanggal_penyerahan' => [
                    'allowed' => true,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'id_shift' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'id_petugas_cross' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'keterangan' => [
                    'allowed' => true,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'id_status_pembayaran' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'id_rekening' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'pengambil_darah' => [
                    'allowed' => true,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'alamat_pengambil' => [
                    'allowed' => true,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'id_penanggung_jawab' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'besar_ppn' => [
                    'allowed' => true,
                    'rules'   => '',
                    'errors'  => [],
                ]
            ],
        );
    }
}