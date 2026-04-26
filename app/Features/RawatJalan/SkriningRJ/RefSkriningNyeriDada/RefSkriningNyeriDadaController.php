<?php
declare(strict_types=1);

namespace App\Features\RawatJalan\SkriningRJ\RefSkriningNyeriDada;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class RefSkriningNyeriDadaController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new RefSkriningNyeriDadaModel(),
            breadcrumbs: [
                ['title' => 'Rawat Jalan', 'icon' => 'rawat_jalan'],
                ['title' => 'Referensi Skrining Nyeri Dada', 'icon' => 'ref_skrining_nyeri_dada'],
            ],
            judul: 'Referensi Skrining Nyeri Dada',
            aksi: [
                'tambah' => false,
                'audit'  => false,
                'ubah'   => false,
                'hapus'  => false,
            ],
            konfig: [
                [HIDE, OPTIONAL, I::INDEX, 'id_nyeri_dada', 'ID Nyeri Dada'],
                [SHOW, REQUIRED, I::TEXT, 'nyeri_dada', 'Nyeri Dada'],
            ],
        );
    }
}