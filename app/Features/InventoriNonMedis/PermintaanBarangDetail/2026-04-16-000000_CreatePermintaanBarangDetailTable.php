<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\PermintaanBarangDetail;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

final class CreatePermintaanBarangDetailTable extends DatabaseTemplate
{
    public function __construct()
    {
        parent::__construct(
            'inventori_non_medis',
            'permintaan_barang_detail',
            [
                'id_detail'      => T::ID32(),
                'id_permintaan'  => T::INT32(),
                'id_barang'      => T::INT32()->nullable(),
                'nama_barang_baru' => T::TEXT()->nullable(),
                'qty'            => T::F64(),
                'qty_disetujui'  => T::F64()->nullable(),
                'catatan'        => T::TEXT()->nullable(),
            ],
            'id_detail',
            [],
            [
                ['id_permintaan', 'permintaan_barang', 'id_permintaan'],
                ['id_barang', 'barang', 'id_barang'],
            ],
            true,
            __DIR__ . '/permintaan_barang_detail.csv'
        );
    }
}
