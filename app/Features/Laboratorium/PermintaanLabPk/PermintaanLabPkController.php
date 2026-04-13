<?php
declare(strict_types=1);

namespace App\Features\Laboratorium\PermintaanLabPk;
use App\Core\Controller\ControllerTemplate;

class PermintaanLabPkController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new PermintaanLabPkModel(),
            breadcrumbs: [
                ['title' => 'Laboratorium', 'icon' => 'laboratorium'],
                ['title' => 'Permintaan Lab PK', 'icon' => 'permintaan_lab_pk'],
            ],
            judul: 'Permintaan Lab PK',
            aksi: [
                'tambah' => true,
                'audit'  => true,
                'ubah'   => true,
                'hapus'  => true,
            ],
            konfig: [
                [0, 'ID Permintaan PK',         'id_permintaan_pk',         'indeks', 0],
                [1, 'ID Permintaan Lab',        'id_permintaan_lab',        'indeks', 1],
                [1, 'ID Item Pemeriksaan',      'id_item_pemeriksaan',      'indeks', 1],
                [1, 'ID Parameter Pemeriksaan', 'id_parameter_pemeriksaan', 'indeks', 1],
            ],
        );
    }
}