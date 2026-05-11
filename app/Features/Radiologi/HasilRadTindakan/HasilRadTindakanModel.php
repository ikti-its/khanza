<?php
declare(strict_types=1);

namespace App\Features\Radiologi\HasilRadTindakan;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

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
                'id_hasil_tindakan' => V::TODO(),
                'id_hasil_rad' => V::TODO(),
                'id_item_rad' => V::TODO(),
                'tarif_tindakan' => V::TODO(),
                'kilovoltage_kv' => V::TODO(),
                'milliampere_second_mas' => V::TODO(),
                'focus_film_distance_ffd' => V::TODO(),
                'back_scatter_factor_bsf' => V::TODO(),
                'inaktivasi' => V::TODO(),
                'jumlah_penyinaran' => V::TODO(),
                'dosis_radiasi' => V::TODO(),
                'hasil_ekspertise' => V::TODO(),
                'id_template_rad' => V::TODO(),
            ],
        );
    }
}