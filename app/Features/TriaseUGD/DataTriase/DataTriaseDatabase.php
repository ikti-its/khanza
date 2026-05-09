<?php
declare(strict_types=1);

namespace App\Features\TriaseUGD\DataTriase;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

final class DataTriaseDatabase extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'triase_ugd',
            'data_triase',
            [
                'id_triase'             => T::ID32(100_000_000),
                'nomor_reg'             => T::FK_AUTO(),
                'tanggal_kunjungan'     => T::DATETIME(),
                'id_cara_masuk'         => T::FK_AUTO(),
                'id_alat_transportasi'  => T::FK_AUTO(),
                'id_alasan_kedatangan'  => T::FK_AUTO(),
                'keterangan_kedatangan' => T::TEXT(),
                'id_macam_kasus'        => T::FK_AUTO(),
                'sistolik'              => T::INT16(),
                'diastolik'             => T::INT16(),
                'nadi'                  => T::INT16(),
                'pernapasan'            => T::INT16(),
                'suhu'                  => T::F32(),
                'saturasi_o2'           => T::INT8(),
                'nyeri'                 => T::INT8(),
            ],
            'id_triase',
            [],
            [
                [
                    'nomor_reg', 
                    \App\Features\RekamMedis\Registrasi\RegistrasiDatabase::class, 
                    'nomor_reg',
                ],
                [
                    'id_cara_masuk', 
                    \App\Features\TriaseUGD\CaraMasuk\CaraMasukDatabase::class, 
                    'id_cara'
                ],
                [
                    'id_alat_transportasi', 
                    \App\Features\TriaseUGD\AlatTransportasi\AlatTransportasiDatabase::class, 
                    'id_transportasi'
                ],
                [
                    'id_alasan_kedatangan',
                    \App\Features\TriaseUGD\AlasanKedatangan\AlasanKedatanganDatabase::class,  
                    'id_alasan'
                ],
                [
                    'id_macam_kasus', 
                    \App\Features\TriaseUGD\TriaseMacamKasus\TriaseMacamKasusDatabase::class, 
                    'id_macam_kasus'
                ],
            ],
            false,
            'data_triase.csv'
        );
    }
}
