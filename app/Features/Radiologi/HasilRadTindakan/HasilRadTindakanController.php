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
                [0, 'ID Hasil Tindakan',      'id_hasil_tindakan',       'indeks', 0],
                [1, 'ID Hasil Rad',           'id_hasil_rad',            'indeks', 1],
                [1, 'Item Radiologi',         'id_item_rad',             'indeks', 1],
                [1, 'Tarif Tindakan',         'tarif_tindakan',          'uang',   1],
                [1, 'Kilovoltage (kV)',        'kilovoltage_kv',          'jumlah', 1],
                [1, 'Milliampere Second (mAs)','milliampere_second_mas',  'jumlah', 1],
                [1, 'Focus Film Distance (FFD)','focus_film_distance_ffd','jumlah', 1],
                [1, 'Back Scatter Factor (BSF)','back_scatter_factor_bsf','jumlah', 1],
                [1, 'Inaktivasi',             'inaktivasi',              'teks',   1],
                [1, 'Jumlah Penyinaran',      'jumlah_penyinaran',       'jumlah', 1],
                [1, 'Dosis Radiasi',          'dosis_radiasi',           'teks',   1],
                [1, 'Hasil Ekspertise',       'hasil_ekspertise',        'teks',   1],
                [0, 'ID Template Rad',        'id_template_rad',         'indeks', 0],
            ],
        );
    }
}