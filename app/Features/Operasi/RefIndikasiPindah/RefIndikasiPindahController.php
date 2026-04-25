<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefIndikasiPindah;
use App\Core\Controller\ControllerTemplate;

final class RefIndikasiPindahController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new RefIndikasiPindahModel(),
            breadcrumbs: [
                ['title' => 'Operasi', 'icon' => 'operasi'],
                ['title' => 'Referensi Indikasi Pindah', 'icon' => 'ref_indikasi_pindah'],
            ],
            judul: 'Referensi Indikasi Pindah',
            aksi: [
                'tambah' => false,
                'audit'  => false,
                'ubah'   => false,
                'hapus'  => false,
            ],
            konfig: [
                //visible, display, kolom, jenis, required
                [0, 'ID Indikasi',   'id_indikasi',   'indeks', 0],
                [1, 'Nama Indikasi', 'nama_indikasi', 'teks',   1],
            ],
        );
    }
}