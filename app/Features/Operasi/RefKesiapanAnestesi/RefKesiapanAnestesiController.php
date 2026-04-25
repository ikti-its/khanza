<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefKesiapanAnestesi;
use App\Core\Controller\ControllerTemplate;

final class RefKesiapanAnestesiController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new RefKesiapanAnestesiModel(),
            breadcrumbs: [
                ['title' => 'Operasi', 'icon' => 'operasi'],
                ['title' => 'Referensi Kesiapan Anestesi', 'icon' => 'ref_kesiapan_anestesi'],
            ],
            judul: 'Referensi Kesiapan Anestesi',
            aksi: [
                'tambah' => false,
                'audit'  => false,
                'ubah'   => false,
                'hapus'  => false,
            ],
            konfig: [
                //visible, display, kolom, jenis, required
                [HIDE, 'ID Kesiapan',   'id_kesiapan',   'indeks', OPTIONAL],
                [SHOW, 'Nama Kesiapan', 'nama_kesiapan', 'teks',   REQUIRED],
            ],
        );
    }
}