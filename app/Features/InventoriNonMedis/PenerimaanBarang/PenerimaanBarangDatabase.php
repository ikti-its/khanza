<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\PenerimaanBarang;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;

final class PenerimaanBarangDatabase extends DatabaseTemplate
{
    public function __construct()
    {
        parent::__construct(
            'inventori_non_medis',
            'penerimaan_barang',
            [
                'id_penerimaan' => T::ID16(10_000),
                'id_pengadaan'  => T::FK_AUTO(),
                'tanggal'       => T::DATETIME(),
                'status'        => T::TEXT(),
                'catatan'       => T::TEXT()->nullable(),
            ],
            'id_penerimaan',
            [],
            [
                [
                    'id_pengadaan',
                    \App\Features\InventoriNonMedis\PengadaanBarang\PengadaanBarangDatabase::class,
                    'id_pengadaan',
                ],
            ],
            true,
            'penerimaan_barang.csv'
        );
    }
}
