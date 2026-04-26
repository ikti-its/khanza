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
            title: 'Permintaan Lab PK',
            action: [
                'tambah' => true,
                'audit'  => true,
                'ubah'   => true,
                'hapus'  => true,
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_permintaan_pk', 'ID Permintaan PK'],
                [SHOW, REQUIRED, I::INDEX, 'id_permintaan_lab', 'ID Permintaan Lab'],
                [SHOW, REQUIRED, I::INDEX, 'id_item_pemeriksaan', 'ID Item Pemeriksaan'],
                [SHOW, REQUIRED, I::INDEX, 'id_parameter_pemeriksaan', 'ID Parameter Pemeriksaan'],
            ],
        );
    }
}