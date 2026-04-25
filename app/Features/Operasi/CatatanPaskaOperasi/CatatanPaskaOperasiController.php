<?php
declare(strict_types=1);

namespace App\Features\Operasi\CatatanPaskaOperasi;
use App\Core\Controller\ControllerTemplate;

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
                [0, 'ID Catatan Paska',        'id_catatan_paska',        'indeks',  0],
                [1, 'Nomor Registrasi',         'nomor_reg',               'teks',    1],
                [1, 'Kode Dokter Bedah',        'kode_dokter_bedah',       'teks',    1],
                [1, 'Waktu Penilaian',          'waktu_penilaian',         'tanggal', 1],
                [1, 'Instruksi Rawat',          'instruksi_rawat',         'teks',    1],
                [1, 'Instruksi Cairan',         'instruksi_cairan',        'teks',    1],
                [1, 'Instruksi Antibiotik',     'instruksi_antibiotik',    'teks',    1],
                [1, 'Instruksi Analgetik',      'instruksi_analgetik',     'teks',    1],
                [1, 'Instruksi Medikamentosa',  'instruksi_medikamentosa', 'teks',    1],
                [1, 'Instruksi Diet',           'instruksi_diet',          'teks',    1],
                [1, 'Instruksi Penunjang',      'instruksi_penunjang',     'teks',    1],
                [1, 'Instruksi Transfusi',      'instruksi_transfusi',     'teks',    1],
                [1, 'Instruksi Lainnya',        'instruksi_lainnya',       'teks',    1],
            ],
        );
    }
}