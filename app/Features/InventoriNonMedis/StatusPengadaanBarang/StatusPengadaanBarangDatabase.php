<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\StatusPengadaanBarang;

use App\Core\Database\Template\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;

final class StatusPengadaanBarangDatabase extends DatabaseTemplate
{
    public function __construct()
    {
        parent::__construct(
            'inventori_non_medis',
            'status_pengadaan_barang',
            [
                'id_status_pengadaan_barang'   => T::ID(10),
                'nama_status_pengadaan_barang' => T::NAME(50),
            ],
            'id_status_pengadaan_barang',
            ['nama_status_pengadaan_barang'],
            [],
            true,
            'status_pengadaan_barang.csv',
        );
    }
}
