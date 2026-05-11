<?php
declare(strict_types=1);

namespace App\Features\Operasi\CatatanAnestesiSedasiMonitoring;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class CatatanAnestesiSedasiMonitoringModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            'BASE',
            'operasi',
            'catatan_anestesi_sedasi_monitoring',
            'id_monitoring',
            [
                'id_monitoring' => V::TODO(),
                'id_catatan_anestesi' => V::TODO(),
                'nama_monitoring' => V::TODO(),
                'is_digunakan' => V::TODO(),
                'keterangan' => V::TODO(),
            ],
        );
    }
}