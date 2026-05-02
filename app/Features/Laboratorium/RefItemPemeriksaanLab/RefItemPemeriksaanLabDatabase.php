<?php
declare(strict_types=1);

namespace App\Features\Laboratorium\RefItemPemeriksaanLab;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

final class RefItemPemeriksaanLabDatabase extends DatabaseTemplate
{
    public function __construct()
    {
        parent::__construct(
            'laboratorium',
            'ref_item_pemeriksaan_lab',
            [
                'id_item_lab' => T::ID32(),
                'id_kategori' => T::FK_AUTO(),
                'kode_periksa' => T::TEXT(),
                'nama_item' => T::TEXT(),
                'tarif' => T::F32(),
            ],
            'id_item_lab',
            ['kode_periksa'],
            [
                [
                    ['id_kategori'],
                    \App\Features\Laboratorium\RefKategoriLab\RefKategoriLabDatabase::class,
                    ['id_kategori'],
                ],
            ],
            false,
            'item_pemeriksaan_lab.csv'
        );
    }
}
