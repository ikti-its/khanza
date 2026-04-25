<?php
declare(strict_types=1);

namespace App\Features\Laboratorium\PermintaanLabMb;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class PermintaanLabMbController extends ControllerTemplate
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
                [HIDE, 'ID Permintaan MB',         'id_permintaan_mb',         I::INDEX, OPTIONAL],
                [SHOW, 'ID Permintaan Lab',        'id_permintaan_lab',        I::INDEX, REQUIRED],
                [SHOW, 'ID Item Pemeriksaan',      'id_item_pemeriksaan',      I::INDEX, REQUIRED],
                [SHOW, 'ID Parameter Pemeriksaan', 'id_parameter_pemeriksaan', I::INDEX, REQUIRED],
            ],
        );
    }
}