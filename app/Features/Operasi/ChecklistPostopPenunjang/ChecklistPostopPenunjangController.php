<?php
declare(strict_types=1);

namespace App\Features\Operasi\ChecklistPostopPenunjang;
use App\Core\Controller\ControllerTemplate;

class ChecklistPostopPenunjangController extends ControllerTemplate
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
                [0, 'ID Penunjang',      'id_penunjang',      'indeks', 0],
                [0, 'ID Checklist Post', 'id_checklist_post', 'indeks', 0],
                [1, 'Jenis Penunjang',   'jenis_penunjang',   'teks',   1],
                [1, 'Ketersediaan',      'id_ketersediaan',   'indeks', 1],
                [1, 'Keterangan',        'keterangan',        'teks',   1],
            ],
        );
    }
}