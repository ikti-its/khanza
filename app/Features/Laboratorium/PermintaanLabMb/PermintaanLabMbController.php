<?php
declare(strict_types=1);

namespace App\Features\Laboratorium\PermintaanLabMb;
use App\Core\Controller\ControllerTemplate;

class PermintaanLabMbController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new PermintaanLabMbModel(),
            breadcrumbs: [
                ['title' => 'Laboratorium', 'icon' => 'laboratorium'],
                ['title' => 'Permintaan Lab MB', 'icon' => 'permintaan_lab_mb'],
            ],
            judul: 'Permintaan Lab MB',
            aksi: [
                'tambah' => true,
                'audit'  => true,
                'ubah'   => true,
                'hapus'  => true,
            ],
            konfig: [
                [0, 'ID Permintaan MB',         'id_permintaan_mb',         'indeks', 0],
                [1, 'ID Permintaan Lab',        'id_permintaan_lab',        'indeks', 1],
                [1, 'ID Item Pemeriksaan',      'id_item_pemeriksaan',      'indeks', 1],
                [1, 'ID Parameter Pemeriksaan', 'id_parameter_pemeriksaan', 'indeks', 1],
            ],
        );
    }
}