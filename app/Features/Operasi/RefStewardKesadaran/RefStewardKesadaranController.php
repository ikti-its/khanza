<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefStewardKesadaran;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class RefStewardKesadaranController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new RefStewardKesadaranModel(),
            breadcrumbs: [
                ['title' => 'Operasi', 'icon' => 'operasi'],
                ['title' => 'Referensi Steward Kesadaran', 'icon' => 'ref_steward_kesadaran'],
            ],
            judul: 'Referensi Steward Kesadaran',
            aksi: [
                'tambah' => false,
                'audit'  => false,
                'ubah'   => false,
                'hapus'  => false,
            ],
            konfig: [
                //visible, display, kolom, jenis, required
                [HIDE, 'ID Kesadaran', 'id_kesadaran', I::INDEX, OPTIONAL],
                [SHOW, 'Nama Skala',   'nama_skala',   I::TEXT,   REQUIRED],
                [SHOW, 'Nilai',        'nilai',        I::NUMBER, REQUIRED],
            ],
        );
    }
}