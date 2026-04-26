<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefKesadaranPascaop;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class RefKesadaranPascaopController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new RefKesadaranPascaopModel(),
            breadcrumbs: [
                ['title' => 'Operasi', 'icon' => 'operasi'],
                ['title' => 'Referensi Kesadaran Pasca Operasi', 'icon' => 'ref_kesadaran_pascaop'],
            ],
            title: 'Referensi Kesadaran Pasca Operasi',
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