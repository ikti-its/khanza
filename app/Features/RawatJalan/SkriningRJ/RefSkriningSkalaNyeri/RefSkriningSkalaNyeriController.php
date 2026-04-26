<?php
declare(strict_types=1);

namespace App\Features\RawatJalan\SkriningRJ\RefSkriningSkalaNyeri;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class RefSkriningSkalaNyeriController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new RefSkriningSkalaNyeriModel(),
            breadcrumbs: [
                ['title' => 'Rawat Jalan', 'icon' => 'rawat_jalan'],
                ['title' => 'Referensi Skrining Skala Nyeri', 'icon' => 'ref_skrining_skala_nyeri'],
            ],
            judul: 'Referensi Skrining Skala Nyeri',
            aksi: [
                'tambah' => false,
                'audit'  => false,
                'ubah'   => false,
                'hapus'  => false,
            ],
            konfig: [
                //visible, display, kolom, jenis, required
                [HIDE, OPTIONAL, I::INDEX, 'id_skala_nyeri', 'ID Skala Nyeri'],
                [SHOW, REQUIRED, I::TEXT, 'skala_nyeri', 'Skala Nyeri'],
            ],
        );
    }
}