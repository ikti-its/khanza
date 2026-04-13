<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\PengadaanBarang;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

class CreatePengadaanBarangTable extends DatabaseTemplate
{
    public function __construct()
    {
        parent::__construct(
            'inventori_non_medis',
            'pengadaan_barang',
            [
                'id_pengadaan'  => T::ID32(),
                'id_pengajuan'  => T::INT32(),
                'id_supplier'   => T::INT32(),
                'tanggal'       => T::DATETIME(),
                'status'        => T::TEXT(),
                'catatan'       => T::TEXT()->nullable(),
            ],
            ['id_pengadaan'],
            [],
            [
                [['id_pengajuan'], 'pengajuan_barang', ['id_pengajuan'], 'CASCADE', 'RESTRICT'],
                [['id_supplier'],  'supplier',         ['id_supplier'],  'CASCADE', 'RESTRICT'],
            ],
            [
                ['tanggal'],
                ['status'],
            ],
            true,
            __DIR__ . '/pengadaan_barang.csv'
        );
    }
}
