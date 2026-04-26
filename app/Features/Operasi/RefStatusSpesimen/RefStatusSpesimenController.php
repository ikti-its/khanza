<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefStatusSpesimen;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class RefStatusSpesimenController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new RefStatusSpesimenModel(),
            breadcrumbs: [
                ['title' => 'Operasi', 'icon' => 'operasi'],
                ['title' => 'Referensi Status Spesimen', 'icon' => 'ref_status_spesimen'],
            ],
            judul: 'Referensi Status Spesimen',
            aksi: [
                'tambah' => false,
                'audit'  => false,
                'ubah'   => false,
                'hapus'  => false,
            ],
            konfig: [
                //visible, display, kolom, jenis, required
                [HIDE, OPTIONAL, I::INDEX, 'id_status_spesimen', 'ID Status Spesimen'],
                [SHOW, REQUIRED, I::TEXT, 'nama_status', 'Nama Status'],
            ],
        );
    }
}