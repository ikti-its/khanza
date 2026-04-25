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
            judul: 'Referensi Item Radiologi',
            aksi: [
                'tambah' => false,
                'audit'  => false,
                'ubah'   => false,
                'hapus'  => false,
            ],
            konfig: [
                //visible, display, kolom, jenis, required
                [HIDE, 'ID Item',          'id_item',          I::INDEX, OPTIONAL],
                [SHOW, 'Kode Periksa',     'kode_periksa',     I::TEXT,   REQUIRED],
                [SHOW, 'Nama Pemeriksaan', 'nama_pemeriksaan', I::TEXT,   REQUIRED],
                [SHOW, 'Tarif Dasar',      'tarif_dasar',      I::MONEY,   REQUIRED],
            ],
        );
    }
}