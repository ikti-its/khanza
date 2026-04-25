<?php
declare(strict_types=1);

namespace App\Features\Operasi\PermintaanOperasi;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

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
                [HIDE, 'ID Permintaan',   'id_permintaan', I::INDEX,  OPTIONAL],
                [SHOW, 'Nomor Registrasi','nomor_reg',     I::TEXT,    REQUIRED],
                [SHOW, 'Kode Dokter',     'kode_dokter',   I::TEXT,    REQUIRED],
                [SHOW, 'Tanggal Minta',   'tanggal_minta', I::DATE, REQUIRED],
                [SHOW, 'CITO',            'is_cito',       I::SELECT,  REQUIRED],
            ],
        );
    }
}