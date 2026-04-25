<?php
declare(strict_types=1);

namespace App\Features\Operasi\CatatanAnestesiSedasiMonitoring;

use App\Core\ModelTemplate;

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
                'id_monitoring' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'id_catatan_anestesi' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'nama_monitoring' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'is_digunakan' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'keterangan' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
            ],
        );
    }
}