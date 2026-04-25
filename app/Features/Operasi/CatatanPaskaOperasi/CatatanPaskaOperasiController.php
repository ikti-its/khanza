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
                [HIDE, 'ID Catatan Paska',        'id_catatan_paska',        'indeks',  OPTIONAL],
                [SHOW, 'Nomor Registrasi',         'nomor_reg',               'teks',    REQUIRED],
                [SHOW, 'Kode Dokter Bedah',        'kode_dokter_bedah',       'teks',    REQUIRED],
                [SHOW, 'Waktu Penilaian',          'waktu_penilaian',         'tanggal', REQUIRED],
                [SHOW, 'Instruksi Rawat',          'instruksi_rawat',         'teks',    REQUIRED],
                [SHOW, 'Instruksi Cairan',         'instruksi_cairan',        'teks',    REQUIRED],
                [SHOW, 'Instruksi Antibiotik',     'instruksi_antibiotik',    'teks',    REQUIRED],
                [SHOW, 'Instruksi Analgetik',      'instruksi_analgetik',     'teks',    REQUIRED],
                [SHOW, 'Instruksi Medikamentosa',  'instruksi_medikamentosa', 'teks',    REQUIRED],
                [SHOW, 'Instruksi Diet',           'instruksi_diet',          'teks',    REQUIRED],
                [SHOW, 'Instruksi Penunjang',      'instruksi_penunjang',     'teks',    REQUIRED],
                [SHOW, 'Instruksi Transfusi',      'instruksi_transfusi',     'teks',    REQUIRED],
                [SHOW, 'Instruksi Lainnya',        'instruksi_lainnya',       'teks',    REQUIRED],
            ],
        );
    }
}