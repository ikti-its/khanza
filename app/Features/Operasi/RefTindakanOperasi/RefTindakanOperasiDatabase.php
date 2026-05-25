<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefTindakanOperasi;

use App\Core\Database\Template\DatabaseTemplate;
use App\Core\Database\Template\SemanticType as T;

final class RefTindakanOperasiDatabase extends DatabaseTemplate
{
    public function __construct()
    {
        parent::__construct(
            'operasi',
            'ref_tindakan_operasi',
            [
                'id_tindakan'   => T::ID(5),
                'kode_tindakan' => T::CODE(10),
                'nama_tindakan' => T::TEXT(),
                'tarif_kelas_3' => T::MONEY(),
                'tarif_kelas_2' => T::MONEY(),
                'tarif_kelas_1' => T::MONEY(),
                'tarif_vip'     => T::MONEY(),
                'tarif_vvip'    => T::MONEY(),
            ],
            'id_tindakan',
            ['kode_tindakan'],
            [],
            false,
            'tindakan_operasi.csv',
        );
    }
}
