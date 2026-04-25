<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefBromage;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class RefBromageController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new RefBromageModel(),
            breadcrumbs: [
                ['title' => 'Operasi', 'icon' => 'operasi'],
                ['title' => 'Referensi Bromage', 'icon' => 'ref_bromage'],
            ],
            judul: 'Referensi Bromage',
            aksi: [
                'tambah' => false,
                'audit'  => false,
                'ubah'   => false,
                'hapus'  => false,
            ],
            konfig: [
                //visible, display, kolom, jenis, required
                [HIDE, 'ID Bromage',   'id_bromage',   I::INDEX, OPTIONAL],
                [SHOW, 'Nama Skala',   'nama_skala',   I::TEXT,   REQUIRED],
                [SHOW, 'Tingkat Blok', 'tingkat_blok', I::TEXT,   REQUIRED],
                [SHOW, 'Nilai',        'nilai',        I::NUMBER, REQUIRED],
                [SHOW, 'Gambar',       'gambar',       I::TEXT,   OPTIONAL],
            ],
        );
    }
}