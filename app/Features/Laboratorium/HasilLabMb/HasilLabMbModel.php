<?php
declare(strict_types=1);

namespace App\Features\Laboratorium\HasilLabMb;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class HasilLabMbModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            new HasilLabMbDatabase(),
            'BASE',
            'laboratorium',
            'hasil_lab_mb',
            'id_hasil_mb',
            [
                'id_hasil_mb' => V::TODO(),
                'id_permintaan_lab' => V::TODO(),
                'nomor_reg' => V::TODO(),
                'kode_dokter_pj' => V::TODO(),
                'id_petugas_lab' => V::TODO(),
                'kode_dokter_perujuk' => V::TODO(),
                'tgl_jam_hasil' => V::TODO(),
                'id_item_pemeriksaan' => V::TODO(),
                'id_parameter_pemeriksaan' => V::TODO(),
                'nilai_hasil' => V::TODO(),
                'keterangan_hasil' => V::TODO(),
            ],
            [
                'id_permintaan_lab'        => [],
                'nomor_reg'                => [],
                'kode_dokter_pj'           => [
                    'id_dokter' => ['id_orang' => ['nama']], 
                    'spesialis'
                ],
                'id_petugas_lab'           => [/*BINGUNG*/],
                'kode_dokter_perujuk'      => [/*BINGUNG*/],
                'id_item_pemeriksaan'      => ['nama_item'],
                'id_parameter_pemeriksaan' => ['nama_parameter', 'satuan', 'nilai_rujukan', 'keterangan', 'biaya_item'],
            ]

        );
    }
}