<?php
declare(strict_types=1);

namespace App\Features\RawatJalan\SkriningRJ\RefSkriningKeputusan;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class RefSkriningKeputusanController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new RefSkriningKeputusanModel(),
            breadcrumbs: [
                ['title' => 'Rawat Jalan', 'icon' => 'rawat_jalan'],
                ['title' => 'Referensi Skrining Keputusan', 'icon' => 'ref_skrining_keputusan'],
            ],
            title: 'Referensi Skrining Keputusan',
            action: [
                'tambah' => false,
                'audit'  => false,
                'ubah'   => false,
                'hapus'  => false,
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_keputusan', 'ID Keputusan'],
                [SHOW, REQUIRED, I::TEXT, 'skrining_keputusan', 'Skrining Keputusan'],
            ],
        );
    }
}