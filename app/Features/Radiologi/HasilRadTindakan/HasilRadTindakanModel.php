<?php
declare(strict_types=1);

namespace App\Features\Radiologi\HasilRadTindakan;

use App\Core\ModelTemplate;

final class HasilRadTindakanModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            'BASE',
            'radiologi',
            'hasil_rad_tindakan',
            'id_hasil_tindakan',
            [
                'id_hasil_tindakan' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'id_hasil_rad' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'id_item_rad' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'tarif_tindakan' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'kilovoltage_kv' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'milliampere_second_mas' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'focus_film_distance_ffd' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'back_scatter_factor_bsf' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'inaktivasi' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'jumlah_penyinaran' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'dosis_radiasi' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'hasil_ekspertise' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'id_template_rad' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
            ],
        );
    }
}