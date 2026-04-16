<?php
declare(strict_types=1);

namespace App\Features\Operasi\ChecklistPostopDrain;
use App\Core\Controller\ControllerTemplate;

class ChecklistPostopDrainController extends ControllerTemplate
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
                [0, 'ID Drain',          'id_drain',          'indeks', 0],
                [0, 'ID Checklist Post', 'id_checklist_post', 'indeks', 0],
                [1, 'Ketersediaan',      'id_ketersediaan',   'indeks', 1],
                [1, 'Jumlah',            'jumlah',            'jumlah', 1],
                [1, 'Letak',             'letak',             'teks',   1],
                [1, 'Warna',             'warna',             'teks',   1],
            ],
        );
    }
}