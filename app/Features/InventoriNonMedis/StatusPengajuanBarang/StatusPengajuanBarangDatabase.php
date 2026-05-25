<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\StatusPengajuanBarang;

use App\Core\Database\Template\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;

final class StatusPengajuanBarangDatabase extends DatabaseTemplate
{
    public function __construct()
    {
        parent::__construct(
            'inventori_non_medis',
            'status_pengajuan_barang',
            [
                'id_status_pengajuan_barang'   => T::ID(10),
                'nama_status_pengajuan_barang' => T::NAME(50),
            ],
            'id_status_pengajuan_barang',
            ['nama_status_pengajuan_barang'],
            [],
            true,
            'status_pengajuan_barang.csv',
        );
    }
}
