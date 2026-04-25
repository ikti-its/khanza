<?php
declare(strict_types=1);

namespace App\Features\Operasi\CatatanAnestesiSedasi;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class CatatanAnestesiSedasiController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new CatatanAnestesiSedasiModel(),
            breadcrumbs: [
                ['title' => 'Operasi', 'icon' => 'operasi'],
                ['title' => 'Catatan Anestesi Sedasi', 'icon' => 'catatan_anestesi_sedasi'],
            ],
            judul: 'Catatan Anestesi Sedasi',
            aksi: [
                'tambah' => true,
                'audit'  => true,
                'ubah'   => true,
                'hapus'  => true,
            ],
            konfig: [
                //visible, display, kolom, jenis, required
                [HIDE, 'ID Catatan Anestesi',   'id_catatan_anestesi',  I::INDEX,  OPTIONAL],
                [SHOW, 'Nomor Registrasi',       'nomor_reg',            I::TEXT,    REQUIRED],
                [SHOW, 'Waktu Catatan',          'waktu_catatan',        I::DATE, REQUIRED],
                [SHOW, 'Diagnosa Pra Bedah',     'diagnosa_pra_bedah',   I::TEXT,    REQUIRED],
                [SHOW, 'Tindakan',               'tindakan',             I::TEXT,    REQUIRED],
                [SHOW, 'Diagnosa Paska Bedah',   'diagnosa_paska_bedah', I::TEXT,    REQUIRED],
                [SHOW, 'Kode DPJP Anestesi',     'kode_dpjp_anestesi',  I::TEXT,    REQUIRED],
                [SHOW, 'Kode DPJP Bedah',        'kode_dpjp_bedah',     I::TEXT,    REQUIRED],
                [SHOW, 'ID Perawat Anestesi',    'id_perawat_anestesi',  I::TEXT,    REQUIRED],
                [SHOW, 'ID Perawat Bedah',       'id_perawat_bedah',     I::TEXT,    REQUIRED],
                [SHOW, 'Jam Pengkajian',         'jam_pengkajian',       I::TIME, REQUIRED],
                [SHOW, 'Kesadaran',              'id_kesadaran',         I::INDEX,  REQUIRED],
                [SHOW, 'Sistolik',               'sistolik',             I::NUMBER,  REQUIRED],
                [SHOW, 'Diastolik',              'diastolik',            I::NUMBER,  REQUIRED],
                [SHOW, 'Nadi',                   'nadi',                 I::NUMBER,  REQUIRED],
                [SHOW, 'Respiratory Rate',       'respiratory_rate',     I::NUMBER,  REQUIRED],
                [SHOW, 'Suhu',                   'suhu',                 'suhu',    REQUIRED],
                [SHOW, 'Saturasi O2',            'saturasi_o2',          I::NUMBER,  REQUIRED],
                [SHOW, 'Tinggi Badan (cm)',       'tinggi_badan_cm',      I::NUMBER,  REQUIRED],
                [SHOW, 'Berat Badan (kg)',        'berat_badan_kg',       I::NUMBER,  REQUIRED],
                [SHOW, 'Golongan Darah',          'id_golongan_darah',    I::INDEX,  REQUIRED],
                [SHOW, 'Rhesus',                  'id_rhesus',            I::INDEX,  REQUIRED],
                [SHOW, 'Hemoglobin',              'hemoglobin',           I::NUMBER,  REQUIRED],
                [SHOW, 'Hematokrit',              'hematokrit',           I::NUMBER,  REQUIRED],
                [SHOW, 'Leukosit',                'leukosit',             I::NUMBER,  REQUIRED],
                [SHOW, 'Trombosit',               'trombosit',            I::NUMBER,  REQUIRED],
                [SHOW, 'Bleeding Time (BT)',       'bleeding_time_bt',     I::NUMBER,  REQUIRED],
                [SHOW, 'Clotting Time (CT)',       'clotting_time_ct',     I::NUMBER,  REQUIRED],
                [SHOW, 'Gula Darah Sewaktu',      'gula_darah_sewaktu',   I::NUMBER,  REQUIRED],
                [SHOW, 'Klinis Lain-lain',         'klinis_lain_lain',     I::TEXT,    REQUIRED],
                [SHOW, 'ASA',                      'id_asa',               I::INDEX,  REQUIRED],
                [SHOW, 'Alergi',                   'is_alergi',            I::SELECT,  REQUIRED],
                [SHOW, 'Keterangan Alergi',        'ket_alergi',           I::TEXT,    REQUIRED],
                [SHOW, 'Penyulit Pra',             'penyulit_pra',         I::TEXT,    REQUIRED],
                [SHOW, 'Lanjut Tindakan',          'is_lanjut_tindakan',   I::SELECT,  REQUIRED],
                [SHOW, 'Jenis Sedasi',             'id_jenis_sedasi',      I::INDEX,  REQUIRED],
                [SHOW, 'Keterangan Sedasi',        'ket_sedasi',           I::TEXT,    REQUIRED],
                [SHOW, 'Epidural',                 'is_epidural',          I::SELECT,  REQUIRED],
                [SHOW, 'Spinal',                   'is_spinal',            I::SELECT,  REQUIRED],
                [SHOW, 'Anestesi Umum',            'is_anestesi_umum',     I::SELECT,  REQUIRED],
                [SHOW, 'Keterangan Anestesi Umum', 'ket_anestesi_umum',    I::TEXT,    REQUIRED],
                [SHOW, 'Blok Perifer',             'is_blok_perifer',      I::SELECT,  REQUIRED],
                [SHOW, 'Keterangan Blok Perifer',  'ket_blok_perifer',     I::TEXT,    REQUIRED],
                [SHOW, 'Batal Tindakan',           'is_batal_tindakan',    I::SELECT,  REQUIRED],
                [SHOW, 'Alasan Batal',             'alasan_batal',         I::TEXT,    REQUIRED],
            ],
        );
    }
}