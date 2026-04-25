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
                [HIDE, 'ID Penunjang',      'id_penunjang',      I::INDEX, OPTIONAL],
                [HIDE, 'ID Checklist Post', 'id_checklist_post', I::INDEX, OPTIONAL],
                [SHOW, 'Jenis Penunjang',   'jenis_penunjang',   I::TEXT,   REQUIRED],
                [SHOW, 'Ketersediaan',      'id_ketersediaan',   I::INDEX, REQUIRED],
                [SHOW, 'Keterangan',        'keterangan',        I::TEXT,   REQUIRED],
            ],
        );
    }
}