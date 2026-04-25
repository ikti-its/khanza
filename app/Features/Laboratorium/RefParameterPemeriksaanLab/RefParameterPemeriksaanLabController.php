<?php
declare(strict_types=1);

namespace App\Features\Laboratorium\RefParameterPemeriksaanLab;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

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
                [HIDE, 'ID Parameter',   'id_parameter',   I::INDEX, OPTIONAL],
                [SHOW, 'Item Lab',       'id_item_lab',    I::INDEX, REQUIRED],
                [SHOW, 'Nama Parameter', 'nama_parameter', I::TEXT,   REQUIRED],
                [SHOW, 'Satuan',         'satuan',         I::TEXT,   OPTIONAL],
                [SHOW, 'Nilai Rujukan',  'nilai_rujukan',  I::TEXT,   OPTIONAL],
                [SHOW, 'Keterangan',     'keterangan',     I::TEXT,   OPTIONAL],
                [SHOW, 'Biaya Item',     'biaya_item',     I::MONEY,   REQUIRED],
            ],
        );
    }
}