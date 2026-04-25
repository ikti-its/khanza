<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefInduksi;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class RefInduksiController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new RefInduksiModel(),
            breadcrumbs: [
                ['title' => 'Operasi', 'icon' => 'operasi'],
                ['title' => 'Referensi Induksi', 'icon' => 'ref_induksi'],
            ],
            judul: 'Referensi Induksi',
            aksi: [
                'tambah' => false,
                'audit'  => false,
                'ubah'   => false,
                'hapus'  => false,
            ],
            konfig: [
                //visible, display, kolom, jenis, required
                [HIDE, 'ID Induksi',   'id_induksi',   'indeks', OPTIONAL],
                [SHOW, 'Nama Induksi', 'nama_induksi', 'teks',   REQUIRED],
            ],
        );
    }
}