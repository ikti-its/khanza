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
                [HIDE, OPTIONAL, I::INDEX, 'id_parameter', 'ID Parameter'],
                [SHOW, REQUIRED, I::INDEX, 'id_item_lab', 'Item Lab'],
                [SHOW, REQUIRED, I::TEXT, 'nama_parameter', 'Nama Parameter'],
                [SHOW, OPTIONAL, I::TEXT, 'satuan', 'Satuan'],
                [SHOW, OPTIONAL, I::TEXT, 'nilai_rujukan', 'Nilai Rujukan'],
                [SHOW, OPTIONAL, I::TEXT, 'keterangan', 'Keterangan'],
                [SHOW, REQUIRED, I::MONEY, 'biaya_item', 'Biaya Item'],
            ],
        );
    }
}