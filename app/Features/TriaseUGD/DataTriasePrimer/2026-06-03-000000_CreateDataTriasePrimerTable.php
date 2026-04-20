<?php
declare(strict_types=1);

namespace App\Features\TriaseUGD\DataTriasePrimer;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

final class CreateDataTriasePrimerTable extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'triase_ugd',
            'data_triase_primer',
            [
                'id_triase_primer'          => T::ID32(),
                'id_triase'                 => T::INT32(),
                'keluhan_utama'             => T::TEXT(),
                'id_kebutuhan_khusus'       => T::INT8(),
                'catatan'                   => T::TEXT(),
                'id_plan_primer'            => T::INT8(),
                'tanggal_triase'            => T::DATETIME(),
                'id_petugas'                => T::UUID(),
            ],
            'id_triase_primer',
            'id_triase',
            [
                ['id_triase', 'data_triase', 'id_triase'],
                ['id_kebutuhan_khusus', 'kebutuhan_khusus', 'id_kebutuhan'],
                ['id_plan_primer', 'plan_primer', 'id_plan_primer'],
                // ['id_petugas', 'sik.pegawai_structure', 'id'],
            ],
        );
    }
}
