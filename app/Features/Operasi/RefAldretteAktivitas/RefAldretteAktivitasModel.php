<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefAldretteAktivitas;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class RefAldretteAktivitasModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'REFS',
            'operasi',
            'ref_aldrette_aktivitas',
            'id_aktivitas',
            [
                'id_aktivitas' => V::TODO(),
                'nama_skala' => V::TODO(),
                'nilai' => V::TODO(),
            ],
        );
    }
}