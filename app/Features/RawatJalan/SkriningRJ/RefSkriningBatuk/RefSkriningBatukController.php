<?php
declare(strict_types=1);

namespace App\Features\RawatJalan\SkriningRJ\RefSkriningBatuk;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class RefSkriningBatukController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new RefSkriningBatukModel(),
            breadcrumbs: [
                ['title' => 'Rawat Jalan', 'icon' => 'rawat_jalan'],
                ['title' => 'Referensi Skrining Batuk', 'icon' => 'ref_skrining_batuk'],
            ],
            title: 'Referensi Skrining Batuk',
            action: [
                'tambah' => false,
                'audit'  => false,
                'ubah'   => false,
                'hapus'  => false,
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_batuk', 'ID Batuk'],
                [SHOW, REQUIRED, I::TEXT, 'kategori_batuk', 'Kategori Batuk'],
            ],
        );
    }
}