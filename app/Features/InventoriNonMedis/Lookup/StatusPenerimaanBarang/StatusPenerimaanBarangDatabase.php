<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\Lookup\StatusPenerimaanBarang;

use App\Core\Database\Template\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;

final class StatusPenerimaanBarangDatabase extends DatabaseTemplate
{
    public function __construct()
    {
        parent::__construct(
            'inventori_non_medis',
            'status_penerimaan_barang',
            [
                'id_status_penerimaan_barang'   => T::ID(10),
                'nama_status_penerimaan_barang' => T::NAME(50),
            ],
            'id_status_penerimaan_barang',
            ['nama_status_penerimaan_barang'],
            [],
            true,
            'status_penerimaan_barang.csv',
        );
    }
}
