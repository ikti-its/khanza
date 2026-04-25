<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefJenisSedasi;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class RefJenisSedasiController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new RefJenisSedasiModel(),
            breadcrumbs: [
                ['title' => 'Operasi', 'icon' => 'operasi'],
                ['title' => 'Referensi Jenis Sedasi', 'icon' => 'ref_jenis_sedasi'],
            ],
            judul: 'Referensi Jenis Sedasi',
            aksi: [
                'tambah' => false,
                'audit'  => false,
                'ubah'   => false,
                'hapus'  => false,
            ],
            konfig: [
                //visible, display, kolom, jenis, required
                [HIDE, 'ID Jenis Sedasi', 'id_jenis_sedasi', 'indeks', OPTIONAL],
                [SHOW, 'Nama Sedasi',     'nama_sedasi',     'teks',   REQUIRED],
            ],
        );
    }
}