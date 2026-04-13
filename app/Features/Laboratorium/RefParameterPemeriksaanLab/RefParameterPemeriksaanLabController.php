<?php
declare(strict_types=1);

namespace App\Features\Laboratorium\RefParameterPemeriksaanLab;
use App\Core\Controller\ControllerTemplate;

class RefParameterPemeriksaanLabController extends ControllerTemplate
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
                [0, 'ID Parameter',   'id_parameter',   'indeks', 0],
                [1, 'Item Lab',       'id_item_lab',    'indeks', 1],
                [1, 'Nama Parameter', 'nama_parameter', 'teks',   1],
                [1, 'Satuan',         'satuan',         'teks',   0],
                [1, 'Nilai Rujukan',  'nilai_rujukan',  'teks',   0],
                [1, 'Keterangan',     'keterangan',     'teks',   0],
                [1, 'Biaya Item',     'biaya_item',     'uang',   1],
            ],
        );
    }
}