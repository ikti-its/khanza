<?php
declare(strict_types=1);

namespace App\Features\RawatJalan\SkriningRJ\RefSkriningPernafasan;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

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
            judul: 'Referensi Skrining Pernafasan',
            aksi: [
                'tambah' => false,
                'audit'  => false,
                'ubah'   => false,
                'hapus'  => false,
            ],
            konfig: [
                //visible, display, kolom, jenis, required
                [HIDE, 'ID Pernafasan', 'id_pernafasan', I::INDEX, OPTIONAL],
                [SHOW, 'Pernafasan',    'pernafasan',    I::TEXT,   REQUIRED],
            ],
        );
    }
}