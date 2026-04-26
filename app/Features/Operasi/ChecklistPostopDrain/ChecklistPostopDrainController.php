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
                [HIDE, OPTIONAL, I::INDEX, 'id_drain', 'ID Drain'],
                [HIDE, OPTIONAL, I::INDEX, 'id_checklist_post', 'ID Checklist Post'],
                [SHOW, REQUIRED, I::INDEX, 'id_ketersediaan', 'Ketersediaan'],
                [SHOW, REQUIRED, I::NUMBER, 'jumlah', 'Jumlah'],
                [SHOW, REQUIRED, I::TEXT, 'letak', 'Letak'],
                [SHOW, REQUIRED, I::TEXT, 'warna', 'Warna'],
            ],
        );
    }
}