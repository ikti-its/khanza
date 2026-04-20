<?php
declare(strict_types=1);

namespace App\Features\LogistikUTD\PengambilanPenunjang;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

final class CreatePengambilanPenunjangTable extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'logistik_utd',
            'pengambilan_penunjang',
            [
                'id_pengambilan_penunjang'  => T::ID32(),
                'id_barang'                 => T::INT32(),
                'jumlah'                    => T::INT32(),
                'harga_beli'                => T::F64(),
                'id_petugas_gudang'         => T::UUID(),
                'tanggal_pengambilan'       => T::DATETIME(),
                'keterangan'                => T::TEXT(),
            ],
            'id_pengambilan_penunjang',
            [],
            [
                // ['id_barang', 'inventori_non_medis.barang', 'id_barang'],
                // ['id_petugas_gudang', 'sik.pegawai_structure', 'id'],
            ],
        );
    }
}
