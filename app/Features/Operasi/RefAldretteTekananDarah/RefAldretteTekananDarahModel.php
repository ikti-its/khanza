<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefAldretteTekananDarah;
use App\Core\Model\ModelTemplate;

final class RefAldretteTekananDarahModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'REFS',
            'operasi',
            'ref_aldrette_tekanan_darah',
            'id_td',
            [
                'id_td' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'nama_skala' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'nilai' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
            ],
        );
    }
}