<?php
declare(strict_types=1);

namespace App\Features\Operasi\ChecklistPostopDrain;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class ChecklistPostopDrainController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new ChecklistPostopDrainModel(),
            breadcrumbs: [
                ['title' => 'Operasi', 'icon' => 'operasi'],
                ['title' => 'Checklist Post Operasi Drain', 'icon' => 'checklist_postop_drain'],
            ],
            judul: 'Checklist Post Operasi Drain',
            aksi: [
                'tambah' => true,
                'audit'  => true,
                'ubah'   => true,
                'hapus'  => true,
            ],
            konfig: [
                //visible, display, kolom, jenis, required
                [HIDE, 'ID Drain',          'id_drain',          'indeks', OPTIONAL],
                [HIDE, 'ID Checklist Post', 'id_checklist_post', 'indeks', OPTIONAL],
                [SHOW, 'Ketersediaan',      'id_ketersediaan',   'indeks', REQUIRED],
                [SHOW, 'Jumlah',            'jumlah',            'jumlah', REQUIRED],
                [SHOW, 'Letak',             'letak',             'teks',   REQUIRED],
                [SHOW, 'Warna',             'warna',             'teks',   REQUIRED],
            ],
        );
    }
}