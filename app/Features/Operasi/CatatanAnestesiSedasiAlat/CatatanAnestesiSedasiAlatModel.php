<?php
declare(strict_types=1);

namespace App\Features\Operasi\CatatanAnestesiSedasiAlat;

use App\Core\ModelTemplate;

class CatatanAnestesiSedasiAlatModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            'BASE',
            'operasi',
            'catatan_anestesi_sedasi_alat',
            'id_alat',
            [
                'id_alat' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'id_catatan_anestesi' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'nama_alat' => [
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