<?php
declare(strict_types=1);

namespace App\Features\DistribusiDarah\PenyerahanDarah;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

final class CreatePenyerahanDarahTable extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'distribusi_darah',
            'penyerahan_darah',
            [
                'id_penyerahan'             => T::ID32(),
                'id_permintaan'             => T::INT32(),
                'no_penyerahan'             => T::TEXT(),
                'tanggal_penyerahan'        => T::DATETIME(),
                'id_shift'                  => T::INT8(),
                'id_petugas_cross'          => T::UUID(),
                'keterangan'                => T::TEXT()->nullable(),
                'id_status_pembayaran'      => T::INT8(),
                'id_rekening'               => T::INT8(),
                'pengambil_darah'           => T::TEXT(),
                'alamat_pengambil'          => T::TEXT(),
                'id_penanggung_jawab'       => T::UUID(),
                'besar_ppn'                 => T::F32(),
            ],
            'id_penyerahan',
            'no_penyerahan',
            [
                ['id_permintaan', 'permintaan_darah', 'id_permintaan'],
                ['id_shift', 'operasional.shift', 'id_shift'],
                // ['id_petugas_cross', 'role.petugas', 'id_petugas'],
                ['id_status_pembayaran', 'status_pembayaran', 'id_status_pembayaran'],
                // ['id_rekening', 'finansial.rekening', 'id_rekening'],
                // ['id_penanggung_jawab', 'role.petugas', 'id_petugas'],
            ],
            false,
            __DIR__ . '/penyerahan_darah.csv'
        );
    }
}
