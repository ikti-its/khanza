<?php
declare(strict_types=1);

namespace App\Features\RawatJalan\SkriningRJ\RefSkriningPernafasan;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class RefSkriningPernafasanController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new RefSkriningPernafasanModel(),
            breadcrumbs: [
                ['title' => 'Rawat Jalan', 'icon' => 'rawat_jalan'],
                ['title' => 'Referensi Skrining Pernafasan', 'icon' => 'ref_skrining_pernafasan'],
            ],
            title: 'Referensi Skrining Pernafasan',
            action: [
                'tambah' => false,
                'audit'  => false,
                'ubah'   => false,
                'hapus'  => false,
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_pernafasan', 'ID Pernafasan'],
                [SHOW, REQUIRED, I::TEXT, 'pernafasan', 'Pernafasan'],
            ],
        );
    }
}