<?php
declare(strict_types=1);

namespace App\Features\Person\JenisKelamin;

use App\Core\ModelTemplate;

final class JenisKelaminModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'REFS',
            'person',
            'jenis_kelamin',
            'id_jenis_kelamin',
            [
                'id_jenis_kelamin' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'nama_jenis_kelamin' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ]
            ],
        );
    }
}