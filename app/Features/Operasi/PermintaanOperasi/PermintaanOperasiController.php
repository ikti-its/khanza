<?php
declare(strict_types=1);

namespace App\Features\Operasi\PermintaanOperasi;
use App\Core\Controller\ControllerTemplate;

final class PermintaanOperasiController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new PermintaanOperasiModel(),
            breadcrumbs: [
                ['title' => 'Operasi', 'icon' => 'operasi'],
                ['title' => 'Permintaan Operasi', 'icon' => 'permintaan_operasi'],
            ],
            judul: 'Permintaan Operasi',
            aksi: [
                'tambah' => true,
                'audit'  => true,
                'ubah'   => true,
                'hapus'  => true,
            ],
            konfig: [
                //visible, display, kolom, jenis, required
                [0, 'ID Permintaan',   'id_permintaan', 'indeks',  0],
                [1, 'Nomor Registrasi','nomor_reg',     'teks',    1],
                [1, 'Kode Dokter',     'kode_dokter',   'teks',    1],
                [1, 'Tanggal Minta',   'tanggal_minta', 'tanggal', 1],
                [1, 'CITO',            'is_cito',       'status',  1],
            ],
        );
    }
}