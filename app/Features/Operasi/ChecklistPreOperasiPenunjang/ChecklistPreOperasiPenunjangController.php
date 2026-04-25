<?php
declare(strict_types=1);

namespace App\Features\Operasi\ChecklistPreOperasiPenunjang;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class ChecklistPreOperasiPenunjangController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new ChecklistPreOperasiPenunjangModel(),
            breadcrumbs: [
                ['title' => 'Operasi', 'icon' => 'operasi'],
                ['title' => 'Checklist Pre Operasi Penunjang', 'icon' => 'checklist_pre_operasi_penunjang'],
            ],
            judul: 'Checklist Pre Operasi Penunjang',
            aksi: [
                'tambah' => true,
                'audit'  => true,
                'ubah'   => true,
                'hapus'  => true,
            ],
            konfig: [
                //visible, display, kolom, jenis, required
                [HIDE, 'ID Penunjang',    'id_penunjang',    I::INDEX, OPTIONAL],
                [HIDE, 'ID Checklist',    'id_checklist',    I::INDEX, OPTIONAL],
                [SHOW, 'Jenis Penunjang', 'jenis_penunjang', I::TEXT,   REQUIRED],
                [SHOW, 'Ketersediaan',    'id_ketersediaan', I::INDEX, REQUIRED],
                [SHOW, 'Keterangan',      'keterangan',      I::TEXT,   REQUIRED],
            ],
        );
    }
}