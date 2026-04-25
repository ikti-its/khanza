<?php
declare(strict_types=1);

namespace App\Features\PenangananDonor\FasyankesRujukan;
use App\Core\Model\ModelTemplate;

final class FasyankesRujukanModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'BASE',
            'penanganan_donor',
            'fasyankes_rujukan',
            'id_fasyankes',
            [
                'id_fasyankes' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'nama_fasyankes' => [
                    'allowed' => true,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'id_alamat' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'kode_pos' => [
                    'allowed' => true,
                    'rules'   => '',
                    'errors'  => [],
                ]
            ],
        );
    }
}