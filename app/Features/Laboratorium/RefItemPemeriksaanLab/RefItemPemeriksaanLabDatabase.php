<?php
declare(strict_types=1);

namespace App\Features\Laboratorium\RefItemPemeriksaanLab;

use App\Core\Database\Template\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;

final class RefItemPemeriksaanLabDatabase extends DatabaseTemplate
{
    public function __construct()
    {
        parent::__construct(
            'laboratorium',
            'ref_item_pemeriksaan_lab',
            [
                'id_item_lab'  => T::ID(100_000_000),
                'id_kategori'  => T::FK_AUTO(),
                'kode_periksa' => T::CODE(8),
                'nama_item'    => T::TEXT(),
                'tarif'        => T::MONEY(),
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
