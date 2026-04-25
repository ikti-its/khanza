<?php
declare(strict_types=1);

namespace App\Features\Operasi\CatatanPaskaOperasi;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class CatatanPaskaOperasiController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new CatatanPaskaOperasiModel(),
            breadcrumbs: [
                ['title' => 'Operasi', 'icon' => 'operasi'],
                ['title' => 'Catatan Paska Operasi', 'icon' => 'catatan_paska_operasi'],
            ],
            judul: 'Catatan Paska Operasi',
            aksi: [
                'tambah' => true,
                'audit'  => true,
                'ubah'   => true,
                'hapus'  => true,
            ],
            konfig: [
                //visible, display, kolom, jenis, required
                [HIDE, 'ID Catatan Paska',        'id_catatan_paska',        I::INDEX,  OPTIONAL],
                [SHOW, 'Nomor Registrasi',         'nomor_reg',               I::TEXT,    REQUIRED],
                [SHOW, 'Kode Dokter Bedah',        'kode_dokter_bedah',       I::TEXT,    REQUIRED],
                [SHOW, 'Waktu Penilaian',          'waktu_penilaian',         I::DATE, REQUIRED],
                [SHOW, 'Instruksi Rawat',          'instruksi_rawat',         I::TEXT,    REQUIRED],
                [SHOW, 'Instruksi Cairan',         'instruksi_cairan',        I::TEXT,    REQUIRED],
                [SHOW, 'Instruksi Antibiotik',     'instruksi_antibiotik',    I::TEXT,    REQUIRED],
                [SHOW, 'Instruksi Analgetik',      'instruksi_analgetik',     I::TEXT,    REQUIRED],
                [SHOW, 'Instruksi Medikamentosa',  'instruksi_medikamentosa', I::TEXT,    REQUIRED],
                [SHOW, 'Instruksi Diet',           'instruksi_diet',          I::TEXT,    REQUIRED],
                [SHOW, 'Instruksi Penunjang',      'instruksi_penunjang',     I::TEXT,    REQUIRED],
                [SHOW, 'Instruksi Transfusi',      'instruksi_transfusi',     I::TEXT,    REQUIRED],
                [SHOW, 'Instruksi Lainnya',        'instruksi_lainnya',       I::TEXT,    REQUIRED],
            ],
        );
    }
}