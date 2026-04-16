<?php
declare(strict_types=1);

namespace App\Features\Operasi\ChecklistPreOperasiPenunjang;
use App\Core\Controller\ControllerTemplate;

class ChecklistPreOperasiPenunjangController extends ControllerTemplate
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
                [0, 'ID Penunjang',    'id_penunjang',    'indeks', 0],
                [0, 'ID Checklist',    'id_checklist',    'indeks', 0],
                [1, 'Jenis Penunjang', 'jenis_penunjang', 'teks',   1],
                [1, 'Ketersediaan',    'id_ketersediaan', 'indeks', 1],
                [1, 'Keterangan',      'keterangan',      'teks',   1],
            ],
        );
    }
}