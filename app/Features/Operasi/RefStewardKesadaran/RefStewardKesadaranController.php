<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefStewardKesadaran;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class RefStewardKesadaranController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new RefStewardKesadaranModel(),
            breadcrumbs: [
                ['title' => 'Operasi', 'icon' => 'operasi'],
                ['title' => 'Referensi Steward Kesadaran', 'icon' => 'ref_steward_kesadaran'],
            ],
            title: 'Referensi Steward Kesadaran',
            action: [
                'tambah' => false,
                'audit'  => false,
                'ubah'   => false,
                'hapus'  => false,
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_kesadaran', 'ID Kesadaran'],
                [SHOW, REQUIRED, I::TEXT, 'nama_skala', 'Nama Skala'],
                [SHOW, REQUIRED, I::NUMBER, 'nilai', 'Nilai'],
            ],
        );
    }
}