<?php
declare(strict_types=1);

namespace App\Features\Person\Orang;
use App\Core\Model\ModelTemplate;

final class OrangModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'BASE',
            'person',
            'orang',
            'id_orang',
            [
                'id_orang' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'nik' => [
                    'allowed' => true,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'nama' => [
                    'allowed' => true,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'id_jenis_kelamin' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'id_agama' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'id_pernikahan' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'id_golongan_darah' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'id_alamat' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'tempat_lahir_prov' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'tempat_lahir_kota' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'tanggal_lahir' => [
                    'allowed' => true,
                    'rules'   => '',
                    'errors'  => [],
                ],
            ],
        );
    }
}