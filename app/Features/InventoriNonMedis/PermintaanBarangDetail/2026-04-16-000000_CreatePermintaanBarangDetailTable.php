<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\PermintaanBarangDetail;

use App\Core\Database\Template;
use App\Core\Database\Type as T;

class CreatePermintaanBarangDetailTable extends Template
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
            ['id_detail'],
            [],
            [
                [['id_permintaan'], 'permintaan_barang', ['id_permintaan'], 'CASCADE', 'RESTRICT'],
                [['id_barang'],     'barang',            ['id_barang'],     'CASCADE', 'SET NULL'],
            ],
            [],
            true,
            __DIR__ . '/permintaan_barang_detail.csv'
        );
    }
}
