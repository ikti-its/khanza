<?php
declare(strict_types=1);

namespace App\Features\DistribusiDarah\PenyerahanDarahDetail;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

class CreatePenyerahanDarahDetailTable extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'distribusi_darah',
            'penyerahan_darah_detail',
            [
                'id_penyerahan_detail'     => T::ID32(),
                'id_penyerahan'            => T::INT32(),
                'id_stok_darah'            => T::INT32(),
                'jasa_sarana'              => T::F32(),
                'paket_bhp'                => T::F32(),
                'kso'                      => T::F32(),
                'manajemen'                => T::F32(),
                // 'total'                    => T::F32(),
            ],
            ['id_penyerahan_detail'],
            [['id_stok_darah']],
            [
                [['id_penyerahan'], 'penyerahan_darah', ['id_penyerahan'], 'CASCADE', 'CASCADE'],
                [['id_stok_darah'], 'inventori_darah.stok_darah', ['id_stok_darah'], 'CASCADE', 'CASCADE'],
            ],
            [['id_penyerahan']],
            false,
            __DIR__ . '/penyerahan_darah_detail.csv'
        );
    }
}
