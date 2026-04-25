<?php
declare(strict_types=1);

namespace App\Features\Radiologi\HasilRadTindakan;
use App\Core\Controller\ControllerTemplate;

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
                [HIDE, 'ID Hasil Tindakan',      'id_hasil_tindakan',       'indeks', OPTIONAL],
                [SHOW, 'ID Hasil Rad',           'id_hasil_rad',            'indeks', REQUIRED],
                [SHOW, 'Item Radiologi',         'id_item_rad',             'indeks', REQUIRED],
                [SHOW, 'Tarif Tindakan',         'tarif_tindakan',          'uang',   REQUIRED],
                [SHOW, 'Kilovoltage (kV)',        'kilovoltage_kv',          'jumlah', REQUIRED],
                [SHOW, 'Milliampere Second (mAs)','milliampere_second_mas',  'jumlah', REQUIRED],
                [SHOW, 'Focus Film Distance (FFD)','focus_film_distance_ffd','jumlah', REQUIRED],
                [SHOW, 'Back Scatter Factor (BSF)','back_scatter_factor_bsf','jumlah', REQUIRED],
                [SHOW, 'Inaktivasi',             'inaktivasi',              'teks',   REQUIRED],
                [SHOW, 'Jumlah Penyinaran',      'jumlah_penyinaran',       'jumlah', REQUIRED],
                [SHOW, 'Dosis Radiasi',          'dosis_radiasi',           'teks',   REQUIRED],
                [SHOW, 'Hasil Ekspertise',       'hasil_ekspertise',        'teks',   REQUIRED],
                [HIDE, 'ID Template Rad',        'id_template_rad',         'indeks', OPTIONAL],
            ],
        );
    }
}