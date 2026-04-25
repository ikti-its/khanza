<?php
declare(strict_types=1);

namespace App\Features\RawatJalan\SkriningRJ\SkriningRawatJalan;

use App\Core\ModelTemplate;

final class SkriningRawatJalanModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            'BASE',
            'skrining_rj',
            'skrining_rawat_jalan',
            'id_skrining',
            [
                'id_skrining' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'no_rm' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'tgl_jam_skrining' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'id_kesadaran' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'id_pernafasan' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'id_skala_nyeri' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'id_nyeri_dada' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'id_batuk' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'is_geriatri' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'is_risiko_jatuh' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'id_keputusan' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'id_petugas' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
            ],
        );
    }
}