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
            new TimeOutSebelumInsisiPenunjangDatabase(),
            'BASE',
            'operasi',
            'timeout_sebelum_insisi_penunjang',
            'id_penunjang',
            [
                'id_penunjang'       => V::DEFAULT(),
                'id_timeout'         => V::DEFAULT(),
                'id_jenis_penunjang' => V::DEFAULT(),
                'id_status'          => V::DEFAULT(),
            ],
            [
                'id_timeout'         => [],
                'id_jenis_penunjang' => ['nama_jenis'],
                'id_status'          => ['nama_status'],
            ],
        );
    }
}
