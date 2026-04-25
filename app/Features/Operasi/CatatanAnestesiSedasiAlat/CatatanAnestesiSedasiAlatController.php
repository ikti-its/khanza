<?php
declare(strict_types=1);

namespace App\Features\Operasi\CatatanAnestesiSedasiAlat;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class CatatanAnestesiSedasiAlatController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new CatatanAnestesiSedasiAlatModel(),
            breadcrumbs: [
                ['title' => 'Operasi', 'icon' => 'operasi'],
                ['title' => 'Catatan Anestesi Sedasi Alat', 'icon' => 'catatan_anestesi_sedasi_alat'],
            ],
            judul: 'Catatan Anestesi Sedasi Alat',
            aksi: [
                'tambah' => true,
                'audit'  => true,
                'ubah'   => true,
                'hapus'  => true,
            ],
            konfig: [
                //visible, display, kolom, jenis, required
                [HIDE, 'ID Alat',            'id_alat',             I::INDEX, OPTIONAL],
                [HIDE, 'ID Catatan Anestesi','id_catatan_anestesi', I::INDEX, OPTIONAL],
                [SHOW, 'Nama Alat',          'nama_alat',           I::TEXT,   REQUIRED],
                [SHOW, 'Digunakan',          'is_digunakan',        I::SELECT, REQUIRED],
                [SHOW, 'Keterangan',         'keterangan',          I::TEXT,   REQUIRED],
            ],
        );
    }
}