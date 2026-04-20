<?php
declare(strict_types=1);

namespace App\Features\LogistikUTD\PenggunaanBHPDonor;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

final class CreatePenggunaanBHPDonorTable extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'logistik_utd',
            'penggunaan_bhp_donor',
            [
                'id_bhp_donor'              => T::ID32(),
                'id_pengambilan_darah'      => T::INT32(),
                'id_jenis_bhp'              => T::INT8(),
                'id_barang_medis'           => T::UUID()->nullable(),
                'id_barang_penunjang'       => T::INT32()->nullable(),
                'jumlah'                    => T::INT32(),
                'harga'                     => T::F64(),
            ],
            'id_bhp_donor',
            [],
            [
                ['id_pengambilan_darah', 'donor.pengambilan_darah', 'id_pengambilan_darah'],
                ['id_jenis_bhp', 'jenis_bhp', 'id_jenis_bhp'],
                // ['id_barang_medis', 'sik.barang_medis_structure','id'],
                // ['id_barang_penunjang', 'inventori_non_medis.barang','id_barang'],
            ],
        );
    }
}
