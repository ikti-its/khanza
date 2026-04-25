<?php
declare(strict_types=1);

namespace App\Features\Operasi\ChecklistPostopPenunjang;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class ChecklistPostopPenunjangController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new ChecklistPostopPenunjangModel(),
            breadcrumbs: [
                ['title' => 'Operasi', 'icon' => 'operasi'],
                ['title' => 'Checklist Post Operasi Penunjang', 'icon' => 'checklist_postop_penunjang'],
            ],
            judul: 'Checklist Post Operasi Penunjang',
            aksi: [
                'tambah' => true,
                'audit'  => true,
                'ubah'   => true,
                'hapus'  => true,
            ],
            konfig: [
                //visible, display, kolom, jenis, required
                [HIDE, 'ID Penunjang',      'id_penunjang',      'indeks', OPTIONAL],
                [HIDE, 'ID Checklist Post', 'id_checklist_post', 'indeks', OPTIONAL],
                [SHOW, 'Jenis Penunjang',   'jenis_penunjang',   'teks',   REQUIRED],
                [SHOW, 'Ketersediaan',      'id_ketersediaan',   'indeks', REQUIRED],
                [SHOW, 'Keterangan',        'keterangan',        'teks',   REQUIRED],
            ],
        );
    }
}