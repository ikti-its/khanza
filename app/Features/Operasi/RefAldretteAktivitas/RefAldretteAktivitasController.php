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
                [HIDE, OPTIONAL, I::INDEX, 'id_aktivitas', 'ID Aktivitas'],
                [SHOW, REQUIRED, I::TEXT, 'nama_skala', 'Nama Skala'],
                [SHOW, REQUIRED, I::NUMBER, 'nilai', 'Nilai'],
            ],
        );
    }
}