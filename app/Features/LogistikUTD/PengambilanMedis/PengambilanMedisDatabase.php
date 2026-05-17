<?php
declare(strict_types=1);

namespace App\Features\LogistikUTD\PengambilanMedis;

use App\Core\Database\Template\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;

final class PengambilanMedisDatabase extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'logistik_utd',
            'pengambilan_medis',
            [
                'id_pengambilan_medis' => T::ID(30_000_000),
                'id_barang'            => T::FK_AUTO(),
                'jumlah'               => T::QTY(1, 999),
                'harga_beli'           => T::MONEY(),
                'nama_bangsal'         => T::NAME(30),
                'tanggal_pengambilan'  => T::DTIME(),
                'keterangan'           => T::NOTE(),
                'nomor_batch'          => T::RECORD(30)->nullable(),
                'nomor_faktur'         => T::RECORD(30)->nullable(),
            ],
            'id_pengambilan_medis',
            [],
            [
                [
                    'id_barang', 
                    \App\Features\InventoriMedis\DataBarang\DataBarangDatabase::class, 
                    'id_barang'
                ],
            ],
            false,
            'pengambilan_medis.csv'
        );
    }
}
