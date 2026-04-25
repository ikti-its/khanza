<?php
declare(strict_types=1);

namespace App\Features\Kontak\JenisTelepon;
use App\Core\Model\ModelTemplate;

final class JenisTeleponModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'REFS',
            'kontak',
            'jenis_telepon',
            'id_jenis_telepon',
            [
                'id_jenis_telepon' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'nama_jenis_telepon' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ]
            ],
        );
    }
}