<?php
declare(strict_types=1);

namespace App\Features\Radiologi\RefItemRad;
use App\Core\Controller\ControllerTemplate;

class RefItemRadController extends ControllerTemplate
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
                [0, 'ID Item',          'id_item',          'indeks', 0],
                [1, 'Kode Periksa',     'kode_periksa',     'teks',   1],
                [1, 'Nama Pemeriksaan', 'nama_pemeriksaan', 'teks',   1],
                [1, 'Tarif Dasar',      'tarif_dasar',      'uang',   1],
            ],
        );
    }
}