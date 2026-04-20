<?php
declare(strict_types=1);

namespace App\Features\LogistikUTD\BHPRusak;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

final class CreateBHPRusakTable extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'logistik_utd',
            'bhp_rusak',
            [
                'id_bhp_rusak'              => T::ID32(),
                'id_jenis_bhp'              => T::INT8(),
                'id_barang_medis'           => T::UUID()->nullable(),
                'id_barang_penunjang'       => T::INT32()->nullable(),
                'jumlah'                    => T::INT32(),
                'harga_beli'                => T::F64(),
                'id_petugas'                => T::UUID(),
                'tanggal_rusak'             => T::DATETIME(),
                'keterangan'                => T::TEXT(),
            ],
            'id_bhp_rusak',
            [],
            [
                ['id_jenis_bhp', 'jenis_bhp', 'id_jenis_bhp'],
                // ['id_barang_medis', 'sik.barang_medis_structure','id'],
                // ['id_barang_penunjang', 'inventori_non_medis.barang','id_barang'],
                // ['id_petugas', 'sik.pegawai_structure', 'id'],
            ],
        );
    }
}
