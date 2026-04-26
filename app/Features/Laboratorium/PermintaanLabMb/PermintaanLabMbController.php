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
                [HIDE, OPTIONAL, I::INDEX, 'id_permintaan_mb', 'ID Permintaan MB'],
                [SHOW, REQUIRED, I::INDEX, 'id_permintaan_lab', 'ID Permintaan Lab'],
                [SHOW, REQUIRED, I::INDEX, 'id_item_pemeriksaan', 'ID Item Pemeriksaan'],
                [SHOW, REQUIRED, I::INDEX, 'id_parameter_pemeriksaan', 'ID Parameter Pemeriksaan'],
            ],
        );
    }
}