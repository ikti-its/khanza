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
                'id_hasil_mb'               => V::DEFAULT(),
                'id_permintaan_lab'         => V::DEFAULT(),
                'nomor_reg'                 => V::DEFAULT(),
                'kode_dokter_pj'            => V::DEFAULT(),
                'id_petugas_lab'            => V::DEFAULT(),
                'kode_dokter_perujuk'       => V::DEFAULT(),
                'tgl_jam_hasil'             => V::DEFAULT(),
                'id_item_pemeriksaan'       => V::DEFAULT(),
                'id_parameter_pemeriksaan'  => V::DEFAULT(),
                'nilai_hasil'               => V::DEFAULT(),
                'keterangan_hasil'          => V::DEFAULT(),
            ],
            [
                'id_permintaan_lab'        => [],
                'nomor_reg'                => ['nomor_rawat'],
                'kode_dokter_pj'           => [
                    'id_dokter' => ['id_orang' => ['nama']], 
                    'spesialis'
                ],
                'id_petugas_lab'           => [/*BINGUNG*/],
                'kode_dokter_perujuk'      => [/*BINGUNG*/],
                'id_item_pemeriksaan'      => ['kode_periksa', 'nama_item', 'tarif'],
                'id_parameter_pemeriksaan' => ['nama_parameter', 'satuan', 'nilai_rujukan', 'keterangan', 'biaya_item'],
            ]

        );
    }
}