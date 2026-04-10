<?php
declare(strict_types=1);

namespace App\Features\LogistikUTD\PenggunaanBHPPenyerahan;

use App\Core\Database\Template;
use App\Core\Database\Type as T;

class CreatePenggunaanBHPPenyerahanTable extends Template
{
    public function __construct(){
        parent::__construct(
            'logistik_utd',
            'penggunaan_bhp_penyerahan',
            [
                'id_bhp_penyerahan'         => T::ID32(),
                'id_penyerahan'             => T::INT32(),
                'id_jenis_bhp'              => T::INT8(),
                'id_barang_medis'           => T::UUID()->nullable(),
                'id_barang_penunjang'       => T::INT32()->nullable(),
                'jumlah'                    => T::INT32(),
                'harga'                     => T::F64(),
            ],
            ['id_bhp_penyerahan'],
            [],
            [
                [['id_penyerahan'], 'distribusi_darah.penyerahan_darah', ['id_penyerahan'], 'CASCADE', 'CASCADE'],
                [['id_jenis_bhp'], 'jenis_bhp', ['id_jenis_bhp'], 'CASCADE', 'CASCADE'],
                // [['id_barang_medis'], 'sik.barang_medis_structure',['id'], 'CASCADE', 'CASCADE'],
                // [['id_barang_penunjang'], 'inventori_non_medis.barang',['id_barang'], 'CASCADE', 'CASCADE'],
            ],
            [['id_penyerahan'], ['id_jenis_bhp']],
        );
    }
}
