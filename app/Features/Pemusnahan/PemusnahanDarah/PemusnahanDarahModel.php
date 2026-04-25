<?php
declare(strict_types=1);

namespace App\Features\Pemusnahan\PemusnahanDarah;
use App\Core\Model\ModelTemplate;

final class PemusnahanDarahModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'BASE',
            'pemusnahan',
            'pemusnahan_darah',
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