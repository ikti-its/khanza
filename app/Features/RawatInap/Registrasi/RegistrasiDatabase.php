<?php
declare(strict_types=1);

namespace App\Features\RawatInap\Registrasi;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;
    
final class RegistrasiDatabase extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'rawat_inap',
            'registrasi',
            [
                'id_rawat_inap'     => T::ID(100_000_000),
                'nomor_rawat'       => T::RECORD(20),
                'nomor_rm'          => T::RECORD(20),
                'nama_pasien'       => T::NAME(50),
                'alamat_pasien'     => T::TEXT(),
                'penanggung_jawab'  => T::NAME(20),
                'hubungan_pj'       => T::TEXT(),
                'jenis_bayar'       => T::NAME(20),
                'kamar'             => T::TEXT(),
                'tarif_kamar'       => T::MONEY(),
                'diagnosa_awal'     => T::TEXT(),
                'diagnosa_akhir'    => T::TEXT()->nullable(),
                'tanggal_masuk'     => T::DATE(),
                'tanggal_keluar'    => T::DATE()->nullable(),
                'jam_keluar'        => T::TIME()->nullable(),
                'total_biaya'       => T::MONEY(),
                'status_pulang'     => T::NAME(20)->nullable(),
                'lama_ranap'        => T::QTY(0, 365),
                'dokter_pj'         => T::NAME(50),
                'status_bayar'      => T::NAME(20)->nullable(),
                'jam_masuk'         => T::TIME(),
            ],
            'id_rawat_inap',
            ['nomor_rawat'],
            [],
            false,
            'registrasi.csv'
        );
    }
}
