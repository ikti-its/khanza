<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\PengajuanBarangDetail;

use App\Core\Database\Template;
use App\Core\Database\Type as T;

class CreatePengajuanBarangDetailTable extends Template
{
    public function __construct()
    {
        parent::__construct(
            'inventori_non_medis',
            'pengajuan_barang_detail',
            [
                'id_detail'       => T::ID32(),
                'id_pengajuan'    => T::INT32(),
                'id_barang'       => T::INT32()->nullable(),
                'nama_barang_baru' => T::TEXT()->nullable(),
                'qty'             => T::F64(),
                'harga_estimasi'  => T::F64()->nullable(),
            ],
            ['id_detail'],
            [],
            [
                [['id_pengajuan'], 'pengajuan_barang', ['id_pengajuan'], 'CASCADE', 'RESTRICT'],
                [['id_barang'],    'barang',           ['id_barang'],    'CASCADE', 'SET NULL'],
            ],
            [],
            true,
            __DIR__ . '/pengajuan_barang_detail.csv'
        );
    }
}
