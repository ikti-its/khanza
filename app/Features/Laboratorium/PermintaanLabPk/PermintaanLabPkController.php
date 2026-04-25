<?php
declare(strict_types=1);

namespace App\Features\Laboratorium\PermintaanLabPk;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class PermintaanLabPkController extends ControllerTemplate
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
                [HIDE, 'ID Permintaan PK',         'id_permintaan_pk',         'indeks', OPTIONAL],
                [SHOW, 'ID Permintaan Lab',        'id_permintaan_lab',        'indeks', REQUIRED],
                [SHOW, 'ID Item Pemeriksaan',      'id_item_pemeriksaan',      'indeks', REQUIRED],
                [SHOW, 'ID Parameter Pemeriksaan', 'id_parameter_pemeriksaan', 'indeks', REQUIRED],
            ],
        );
    }
}