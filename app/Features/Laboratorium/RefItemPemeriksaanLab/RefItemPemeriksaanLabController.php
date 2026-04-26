<?php
declare(strict_types=1);

namespace App\Features\Laboratorium\RefItemPemeriksaanLab;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class RefItemPemeriksaanLabController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new RefItemPemeriksaanLabModel(),
            breadcrumbs: [
                ['title' => 'Laboratorium', 'icon' => 'laboratorium'],
                ['title' => 'Referensi Item Pemeriksaan', 'icon' => 'ref_item_pemeriksaan_lab'],
            ],
            title: 'Referensi Item Pemeriksaan Lab',
            action: [
                'tambah' => false,
                'audit'  => false,
                'ubah'   => false,
                'hapus'  => false,
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_item_lab', 'ID Item Lab'],
                [SHOW, REQUIRED, I::INDEX, 'id_kategori', 'Kategori'],
                [SHOW, REQUIRED, I::TEXT, 'kode_periksa', 'Kode Periksa'],
                [SHOW, REQUIRED, I::TEXT, 'nama_item', 'Nama Item'],
                [SHOW, REQUIRED, I::MONEY, 'tarif', 'Tarif'],
            ],
        );
    }
}