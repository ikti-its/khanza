<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefAldretteAktivitas;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class RefAldretteAktivitasController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new RefAldretteAktivitasModel(),
            breadcrumbs: [
                ['title' => 'Operasi', 'icon' => 'operasi'],
                ['title' => 'Referensi Aldrette Aktivitas', 'icon' => 'ref_aldrette_aktivitas'],
            ],
            judul: 'Referensi Aldrette Aktivitas',
            aksi: [
                'tambah' => false,
                'audit'  => false,
                'ubah'   => false,
                'hapus'  => false,
            ],
            konfig: [
                //visible, display, kolom, jenis, required
                [HIDE, 'ID Aktivitas', 'id_aktivitas', I::INDEX, OPTIONAL],
                [SHOW, 'Nama Skala',   'nama_skala',   I::TEXT,   REQUIRED],
                [SHOW, 'Nilai',        'nilai',        I::NUMBER, REQUIRED],
            ],
        );
    }
}