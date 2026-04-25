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
            judul: 'Referensi Skrining Batuk',
            aksi: [
                'tambah' => false,
                'audit'  => false,
                'ubah'   => false,
                'hapus'  => false,
            ],
            konfig: [
                //visible, display, kolom, jenis, required
                [HIDE, 'ID Batuk',      'id_batuk',       I::INDEX, OPTIONAL],
                [SHOW, 'Kategori Batuk','kategori_batuk', I::TEXT,   REQUIRED],
            ],
        );
    }
}