<?php
declare(strict_types=1);

namespace App\Features\LogistikUTD\PengambilanMedis;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

final class CreatePengambilanMedisTable extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'logistik_utd',
            'pengambilan_medis',
            [
                'id_pengambilan_medis'      => T::ID32(),
                'id_barang'                 => T::UUID(),
                'jumlah'                    => T::INT32(),
                'harga_beli'                => T::F64(),
                'nama_bangsal'              => T::TEXT(),
                'tanggal_pengambilan'       => T::DATETIME(),
                'keterangan'                => T::TEXT(),
                'nomor_batch'               => T::TEXT()->nullable(),
                'nomor_faktur'              => T::TEXT()->nullable(),
            ],
            'id_pengambilan_medis',
            [],
            [
                // ['id_barang', 'sik.barang_medis_structure', 'id'],
            ],
        );
    }
}
