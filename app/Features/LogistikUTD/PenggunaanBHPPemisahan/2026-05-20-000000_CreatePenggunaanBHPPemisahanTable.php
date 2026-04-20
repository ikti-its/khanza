<?php
declare(strict_types=1);

namespace App\Features\LogistikUTD\PenggunaanBHPPemisahan;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

class CreatePenggunaanBHPPemisahanTable extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'logistik_utd',
            'penggunaan_bhp_pemisahan',
            [
                'id_bhp_pemisahan'          => T::ID32(),
                'id_pemisahan'              => T::INT32(),
                'id_jenis_bhp'              => T::INT8(),
                'id_barang_medis'           => T::UUID()->nullable(),
                'id_barang_penunjang'       => T::INT32()->nullable(),
                'jumlah'                    => T::INT32(),
                'harga'                     => T::F64(),
            ],
            ['id_bhp_pemisahan'],
            [],
            [
                [['id_pemisahan'], 'inventori_darah.pemisahan_komponen', ['id_pemisahan'], 'CASCADE', 'CASCADE'],
                [['id_jenis_bhp'], 'jenis_bhp', ['id_jenis_bhp'], 'CASCADE', 'CASCADE'],
                // [['id_barang_medis'], 'sik.barang_medis_structure',['id'], 'CASCADE', 'CASCADE'],
                // [['id_barang_penunjang'], 'inventori_non_medis.barang',['id_barang'], 'CASCADE', 'CASCADE'],
            ],
        );
    }
}
