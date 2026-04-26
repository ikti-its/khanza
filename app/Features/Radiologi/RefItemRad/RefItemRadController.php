<?php
declare(strict_types=1);

namespace App\Features\Radiologi\RefItemRad;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class RefItemRadController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new RefItemRadModel(),
            breadcrumbs: [
                ['title' => 'Radiologi', 'icon' => 'radiologi'],
                ['title' => 'Referensi Item Radiologi', 'icon' => 'ref_item_rad'],
            ],
            title: 'Referensi Item Radiologi',
            action: [
                'tambah' => false,
                'audit'  => false,
                'ubah'   => false,
                'hapus'  => false,
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_item', 'ID Item'],
                [SHOW, REQUIRED, I::TEXT, 'kode_periksa', 'Kode Periksa'],
                [SHOW, REQUIRED, I::TEXT, 'nama_pemeriksaan', 'Nama Pemeriksaan'],
                [SHOW, REQUIRED, I::MONEY, 'tarif_dasar', 'Tarif Dasar'],
            ],
        );
    }
}