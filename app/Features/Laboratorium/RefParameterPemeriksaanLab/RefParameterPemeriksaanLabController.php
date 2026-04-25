<?php
declare(strict_types=1);

namespace App\Features\Laboratorium\RefParameterPemeriksaanLab;
use App\Core\Controller\ControllerTemplate;

final class RefParameterPemeriksaanLabController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new RefParameterPemeriksaanLabModel(),
            breadcrumbs: [
                ['title' => 'Laboratorium', 'icon' => 'laboratorium'],
                ['title' => 'Referensi Parameter Pemeriksaan', 'icon' => 'ref_parameter_pemeriksaan_lab'],
            ],
            judul: 'Referensi Parameter Pemeriksaan Lab',
            aksi: [
                'tambah' => false,
                'audit'  => false,
                'ubah'   => false,
                'hapus'  => false,
            ],
            konfig: [
                //visible, display, kolom, jenis, required
                [HIDE, 'ID Parameter',   'id_parameter',   'indeks', OPTIONAL],
                [SHOW, 'Item Lab',       'id_item_lab',    'indeks', REQUIRED],
                [SHOW, 'Nama Parameter', 'nama_parameter', 'teks',   REQUIRED],
                [SHOW, 'Satuan',         'satuan',         'teks',   OPTIONAL],
                [SHOW, 'Nilai Rujukan',  'nilai_rujukan',  'teks',   OPTIONAL],
                [SHOW, 'Keterangan',     'keterangan',     'teks',   OPTIONAL],
                [SHOW, 'Biaya Item',     'biaya_item',     'uang',   REQUIRED],
            ],
        );
    }
}