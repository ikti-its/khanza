<?php
declare(strict_types=1);

namespace App\Features\TriaseUGD\DataTriaseSekunder;

use App\Core\Database\DatabaseTemplate;
use App\Core\Database\DatabaseType as T;

final class CreateDataTriaseSekunderTable extends DatabaseTemplate
{
    public function __construct(){
        parent::__construct(
            'triase_ugd',
            'data_triase_sekunder',
            [
                'id_triase_sekunder'        => T::ID32(),
                'id_triase'                 => T::INT32(),
                'anamnesa_singkat'          => T::TEXT(),
                'catatan'                   => T::TEXT(),
                'id_plan_sekunder'          => T::INT8(),
                'tanggal_triase'            => T::DATETIME(),
                'id_petugas'                => T::UUID(),
            ],
            'id_triase_sekunder',
            'id_triase',
            [
                ['id_triase', 'data_triase', 'id_triase'],
                ['id_plan_sekunder', 'plan_sekunder', 'id_plan_sekunder'],
                // ['id_petugas', 'sik.pegawai_structure', 'id'],
            ],
        );
    }
}
