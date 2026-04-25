<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefKesadaranPascaop;
use App\Core\Controller\ControllerTemplate;

final class RefKesadaranPascaopController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new RefKesadaranPascaopModel(),
            breadcrumbs: [
                ['title' => 'Operasi', 'icon' => 'operasi'],
                ['title' => 'Referensi Kesadaran Pasca Operasi', 'icon' => 'ref_kesadaran_pascaop'],
            ],
            judul: 'Referensi Kesadaran Pasca Operasi',
            aksi: [
                'tambah' => false,
                'audit'  => false,
                'ubah'   => false,
                'hapus'  => false,
            ],
            konfig: [
                //visible, display, kolom, jenis, required
                [0, 'ID Kesadaran',   'id_kesadaran',   'indeks', 0],
                [1, 'Nama Kesadaran', 'nama_kesadaran', 'teks',   1],
            ],
        );
    }
}