<?php
declare(strict_types=1);

namespace App\Features\Operasi\TimeOutSebelumInsisiPenunjang;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class TimeOutSebelumInsisiPenunjangModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            'BASE',
            'operasi',
            'timeout_sebelum_insisi_penunjang',
            'id_penunjang',
            [
                'id_penunjang' => V::TODO(),
                'id_timeout' => V::TODO(),
                'id_jenis_penunjang' => V::TODO(),
                'id_status' => V::TODO(),
            ],
        );
    }
}