<?php
declare(strict_types=1);

namespace App\Features\RawatJalan\SkriningRJ\RefSkriningKesadaran;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class RefSkriningKesadaranController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new RefSkriningKesadaranModel(),
            breadcrumbs: [
                ['title' => 'Rawat Jalan', 'icon' => 'rawat_jalan'],
                ['title' => 'Referensi Skrining Kesadaran', 'icon' => 'ref_skrining_kesadaran'],
            ],
            title: 'Referensi Skrining Kesadaran',
            action: [
                'tambah' => false,
                'audit'  => false,
                'ubah'   => false,
                'hapus'  => false,
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_kesadaran', 'ID Kesadaran'],
                [SHOW, REQUIRED, I::TEXT, 'kesadaran', 'Kesadaran'],
            ],
        );
    }
}