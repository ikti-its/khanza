<?php
declare(strict_types=1);

namespace App\Features\DistribusiDarah\PenyerahanDarah;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class PenyerahanDarahModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            new PenyerahanDarahDatabase(),
            'BASE',
            'distribusi_darah',
            'penyerahan_darah',
            'id_penyerahan',
            [
                'id_penyerahan'         => V::DEFAULT(),
                'no_penyerahan'         => V::DEFAULT(),
                'tanggal_penyerahan'    => V::DEFAULT(),
                'keterangan'            => V::DEFAULT(),
                'pengambil_darah'       => V::DEFAULT(),
                'alamat_pengambil'      => V::DEFAULT(),
                'besar_ppn'             => V::DEFAULT()
            ],
            [
                'id_permintaan'         => ['no_permintaan'],
                'id_shift'              => ['nama_shift'],
                'id_petugas_cross'      => [''],
                'id_status_pembayaran'  => ['nama_status_pembayaran'],
                'id_rekening'           => ['nama_akun'],
                'id_penanggung_jawab'   => ['']
            ]
        );
    }
}