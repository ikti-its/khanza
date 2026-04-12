<?php
declare(strict_types=1);

namespace App\Features\TriaseUGD\DataTriase;

use App\Core\Database\Template;
use App\Core\Database\Type as T;

class CreateDataTriaseTable extends Template
{
    public function __construct(){
        parent::__construct(
            'triase_ugd',
            'data_triase',
            [
                'id_triase'                  => T::ID32(),
                'nomor_reg'                  => T::TEXT(),
                'tanggal_kunjungan'          => T::DATETIME(),
                'id_cara_masuk'              => T::INT8(),
                'id_alat_transportasi'       => T::INT8(),
                'id_alasan_kedatangan'       => T::INT8(),
                'keterangan_kedatangan'      => T::TEXT(),
                'id_macam_kasus'             => T::INT8(),
                'sistolik'                   => T::INT16(),
                'diastolik'                  => T::INT16(),
                'nadi'                       => T::INT16(),
                'pernapasan'                 => T::INT16(),
                'suhu'                       => T::F32(),
                'saturasi_o2'                => T::INT8(),
                'nyeri'                      => T::INT8(),
            ],
            ['id_triase'],
            [],
            [
                // [['nomor_reg'], 'sik.ugd_structure', ['nomor_reg'], 'CASCADE', 'CASCADE'],
                [['id_cara_masuk'], 'cara_masuk', ['id_cara'], 'CASCADE', 'CASCADE'],
                [['id_alat_transportasi'], 'alat_transportasi', ['id_transportasi'], 'CASCADE', 'CASCADE'],
                [['id_alasan_kedatangan'], 'alasan_kedatangan', ['id_alasan'], 'CASCADE', 'CASCADE'],
                [['id_macam_kasus'], 'triase_macam_kasus', ['id_macam_kasus'], 'CASCADE', 'CASCADE'],
            ],
            [['nomor_reg']],
        );
    }
}
