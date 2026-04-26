<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefKesadaran;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class RefKesadaranController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new RefKesadaranModel(),
            breadcrumbs: [
                ['title' => 'Operasi', 'icon' => 'operasi'],
                ['title' => 'Referensi Kesadaran', 'icon' => 'ref_kesadaran'],
            ],
            title: 'Referensi Kesadaran',
            action: [
                'tambah' => false,
                'audit'  => false,
                'ubah'   => false,
                'hapus'  => false,
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_kesadaran', 'ID Kesadaran'],
                [SHOW, REQUIRED, I::TEXT, 'nama_kesadaran', 'Nama Kesadaran'],
            ],
        );
    }
}