<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefRuanganOperasi;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class RefRuanganOperasiController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new RefRuanganOperasiModel(),
            breadcrumbs: [
                ['title' => 'Operasi', 'icon' => 'operasi'],
                ['title' => 'Referensi Ruangan Operasi', 'icon' => 'ref_ruangan_operasi'],
            ],
            judul: 'Referensi Ruangan Operasi',
            aksi: [
                'tambah' => false,
                'audit'  => false,
                'ubah'   => false,
                'hapus'  => false,
            ],
            konfig: [
                //visible, display, kolom, jenis, required
                [HIDE, 'ID Ruangan',   'id_ruangan',   I::INDEX, OPTIONAL],
                [SHOW, 'Kode Ruangan', 'kode_ruangan', I::TEXT,   REQUIRED],
                [SHOW, 'Nama Ruangan', 'nama_ruangan', I::TEXT,   REQUIRED],
            ],
        );
    }
}