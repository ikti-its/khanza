<?php
declare(strict_types=1);

namespace App\Features\LogistikUTD\BHPRusak;

use App\Core\Database\Template;
use App\Core\Database\Type as T;

class CreateBHPRusakTable extends Template
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
            ['id_bhp_rusak'],
            [],
            [
                [['id_jenis_bhp'], 'jenis_bhp', ['id_jenis_bhp'], 'CASCADE', 'CASCADE'],
                // [['id_barang_medis'], 'sik.barang_medis_structure',['id'], 'CASCADE', 'CASCADE'],
                // [['id_barang_penunjang'], 'inventori_non_medis.barang',['id_barang'], 'CASCADE', 'CASCADE'],
                // [['id_petugas'], 'sik.pegawai_structure', ['id'], 'CASCADE', 'CASCADE'],
            ],
            [['id_jenis_bhp'], ['tanggal_rusak']],
        );
    }
}
