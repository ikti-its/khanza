<?php
declare(strict_types=1);

namespace App\Features\Laboratorium\HasilLabPk;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class HasilLabPkController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new HasilLabPkModel(),
            breadcrumbs: [
                ['title' => 'Laboratorium', 'icon' => 'laboratorium'],
                ['title' => 'Hasil Lab PK', 'icon' => 'hasil_lab_pk'],
            ],
            judul: 'Hasil Lab PK',
            aksi: [
                'tambah' => true,
                'audit'  => true,
                'ubah'   => true,
                'hapus'  => true,
            ],
            konfig: [
                [HIDE, 'ID Hasil PK',              'id_hasil_pk',              I::INDEX,  OPTIONAL],
                [SHOW, 'ID Permintaan Lab',        'id_permintaan_lab',        I::INDEX,  REQUIRED],
                [SHOW, 'Nomor Registrasi',         'nomor_reg',                I::TEXT,    REQUIRED],
                [SHOW, 'Kode Dokter PJ',           'kode_dokter_pj',           I::TEXT,    REQUIRED],
                [SHOW, 'ID Petugas Lab',           'id_petugas_lab',           I::TEXT,    REQUIRED],
                [SHOW, 'Kode Dokter Perujuk',      'kode_dokter_perujuk',      I::TEXT,    REQUIRED],
                [SHOW, 'Tanggal & Jam Hasil',      'tgl_jam_hasil',            I::DATE, REQUIRED],
                [SHOW, 'ID Kategori Usia',         'id_kategori_usia',         I::INDEX,  REQUIRED],
                [SHOW, 'ID Item Pemeriksaan',      'id_item_pemeriksaan',      I::INDEX,  REQUIRED],
                [SHOW, 'ID Parameter Pemeriksaan', 'id_parameter_pemeriksaan', I::INDEX,  REQUIRED],
                [SHOW, 'Nilai Hasil',              'nilai_hasil',              I::TEXT,    REQUIRED],
                [SHOW, 'Keterangan Hasil',         'keterangan_hasil',         I::TEXT,    OPTIONAL],
            ],
        );
    }
}