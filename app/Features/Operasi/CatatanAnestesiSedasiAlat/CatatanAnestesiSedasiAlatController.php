<?php
declare(strict_types=1);

namespace App\Features\Operasi\CatatanAnestesiSedasiAlat;
use App\Core\Controller\ControllerTemplate;

class CatatanAnestesiSedasiAlatController extends ControllerTemplate
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
                [0, 'ID Alat',            'id_alat',             'indeks', 0],
                [0, 'ID Catatan Anestesi','id_catatan_anestesi', 'indeks', 0],
                [1, 'Nama Alat',          'nama_alat',           'teks',   1],
                [1, 'Digunakan',          'is_digunakan',        'status', 1],
                [1, 'Keterangan',         'keterangan',          'teks',   1],
            ],
        );
    }
}