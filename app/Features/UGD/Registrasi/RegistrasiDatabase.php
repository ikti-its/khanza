<?php
declare(strict_types=1);

namespace App\Features\UGD\Registrasi;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;
    
final class RegistrasiDatabase extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'ugd',
            'registrasi',
            [
                'nomor_reg'         => T::RECORD(20),
                'nomor_rawat'       => T::RECORD(20),
                'tanggal'           => T::DATE(),
                'jam'               => T::TIME(),
                'kode_dokter'       => T::CODE(10),
                'dokter_dituju'     => T::NAME(50),
                'nomor_rm'          => T::RECORD(20),
                'nama_pasien'       => T::NAME(50),
                'jenis_kelamin'     => T::CODE(1),
                'poliklinik'        => T::TEXT(),
                'penanggung_jawab'  => T::NAME(50),
                'alamat_pj'         => T::TEXT(),
                'hubungan_pj'       => T::TEXT(),
                'biaya_registrasi'  => T::MONEY(),
                'jenis_bayar'       => T::NAME(50),
                'status_rawat'      => T::NAME(50),
                'status_bayar'      => T::NAME(50),
            ],
            'nomor_reg',
            ['nomor_rawat'],
            [],
            false,
            'registrasi.csv'
        );
    }
}
