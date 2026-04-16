<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefRuanganOperasi;
use App\Core\Controller\ControllerTemplate;

class RefRuanganOperasiController extends ControllerTemplate
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
                [0, 'ID Ruangan',   'id_ruangan',   'indeks', 0],
                [1, 'Kode Ruangan', 'kode_ruangan', 'teks',   1],
                [1, 'Nama Ruangan', 'nama_ruangan', 'teks',   1],
            ],
        );
    }
}