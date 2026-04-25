<?php
declare(strict_types=1);

namespace App\Features\Radiologi\HasilRadTindakan;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class HasilRadTindakanController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new HasilRadTindakanModel(),
            breadcrumbs: [
                ['title' => 'Radiologi', 'icon' => 'radiologi'],
                ['title' => 'Hasil Radiologi Tindakan', 'icon' => 'hasil_rad_tindakan'],
            ],
            judul: 'Hasil Radiologi Tindakan',
            aksi: [
                'tambah' => true,
                'audit'  => true,
                'ubah'   => true,
                'hapus'  => true,
            ],
            konfig: [
                //visible, display, kolom, jenis, required
                [HIDE, 'ID Hasil Tindakan',      'id_hasil_tindakan',       I::INDEX, OPTIONAL],
                [SHOW, 'ID Hasil Rad',           'id_hasil_rad',            I::INDEX, REQUIRED],
                [SHOW, 'Item Radiologi',         'id_item_rad',             I::INDEX, REQUIRED],
                [SHOW, 'Tarif Tindakan',         'tarif_tindakan',          I::MONEY,   REQUIRED],
                [SHOW, 'Kilovoltage (kV)',        'kilovoltage_kv',          I::NUMBER, REQUIRED],
                [SHOW, 'Milliampere Second (mAs)','milliampere_second_mas',  I::NUMBER, REQUIRED],
                [SHOW, 'Focus Film Distance (FFD)','focus_film_distance_ffd',I::NUMBER, REQUIRED],
                [SHOW, 'Back Scatter Factor (BSF)','back_scatter_factor_bsf',I::NUMBER, REQUIRED],
                [SHOW, 'Inaktivasi',             'inaktivasi',              I::TEXT,   REQUIRED],
                [SHOW, 'Jumlah Penyinaran',      'jumlah_penyinaran',       I::NUMBER, REQUIRED],
                [SHOW, 'Dosis Radiasi',          'dosis_radiasi',           I::TEXT,   REQUIRED],
                [SHOW, 'Hasil Ekspertise',       'hasil_ekspertise',        I::TEXT,   REQUIRED],
                [HIDE, 'ID Template Rad',        'id_template_rad',         I::INDEX, OPTIONAL],
            ],
        );
    }
}