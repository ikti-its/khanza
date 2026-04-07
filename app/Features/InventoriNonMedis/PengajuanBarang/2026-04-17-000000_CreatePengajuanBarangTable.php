<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\PengajuanBarang;

use App\Core\Database\Template;
use App\Core\Database\Type as T;

class CreatePengajuanBarangTable extends Template
{
    public function __construct()
    {
        parent::__construct(
            'inventori_non_medis',
            'pengajuan_barang',
            [
                'id_pengajuan'     => T::ID32(),
                'id_permintaan'    => T::INT32()->nullable(),
                'tanggal'          => T::DATETIME(),
                'status'           => T::TEXT(),
                'catatan'          => T::TEXT()->nullable(),
                'catatan_atasan'   => T::TEXT()->nullable(),
            ],
            ['id_pengajuan'],
            [],
            [
                [['id_permintaan'], 'permintaan_barang', ['id_permintaan'], 'CASCADE', 'SET NULL'],
            ],
            [
                ['tanggal'],
                ['status'],
            ],
            true,
            __DIR__ . '/pengajuan_barang.csv'
        );
    }
}
