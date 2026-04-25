<?php
declare(strict_types=1);

namespace App\Features\Operasi\PenyerahanPasienPeralatan;

use App\Core\ModelTemplate;

final class PenyerahanPasienPeralatanModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            'BASE',
            'operasi',
            'penyerahan_pasien_peralatan',
            'id',
            [
                'id' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'id_penyerahan' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'id_peralatan' => [
                    'allowed' => false,
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