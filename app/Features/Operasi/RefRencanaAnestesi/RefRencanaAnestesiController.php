<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefRencanaAnestesi;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class RefRencanaAnestesiController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new RefRencanaAnestesiModel(),
            breadcrumbs: [
                ['title' => 'Operasi', 'icon' => 'operasi'],
                ['title' => 'Referensi Rencana Anestesi', 'icon' => 'ref_rencana_anestesi'],
            ],
            judul: 'Referensi Rencana Anestesi',
            aksi: [
                'tambah' => false,
                'audit'  => false,
                'ubah'   => false,
                'hapus'  => false,
            ],
            konfig: [
                //visible, display, kolom, jenis, required
                [HIDE, OPTIONAL, I::INDEX, 'id_rencana_anestesi', 'ID Rencana Anestesi'],
                [SHOW, REQUIRED, I::TEXT, 'nama_rencana', 'Nama Rencana'],
            ],
        );
    }
}