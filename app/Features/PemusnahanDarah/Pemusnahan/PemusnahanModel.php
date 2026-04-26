<?php
declare(strict_types=1);

namespace App\Features\PemusnahanDarah\Pemusnahan;
use App\Core\Model\ModelTemplate;

final class PemusnahanModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'BASE',
            'pemusnahan_darah',
            'pemusnahan',
            'id_pemusnahan',
            [
                'id_pemusnahan' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'tanggal_pemusnahan' => [
                    'allowed' => true,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'id_petugas' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'keterangan' => [
                    'allowed' => true,
                    'rules'   => '',
                    'errors'  => [],
                ]
            ],
        );
    }
}