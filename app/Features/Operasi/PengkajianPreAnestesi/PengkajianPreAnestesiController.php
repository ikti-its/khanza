<?php
declare(strict_types=1);

namespace App\Features\Operasi\PengkajianPreAnestesi;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class PengkajianPreAnestesiController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new PengkajianPreAnestesiModel(),
            breadcrumbs: [
                ['title' => 'Operasi', 'icon' => 'operasi'],
                ['title' => 'Pengkajian Pre Anestesi', 'icon' => 'pengkajian_pre_anestesi'],
            ],
            judul: 'Pengkajian Pre Anestesi',
            aksi: [
                'tambah' => true,
                'audit'  => true,
                'ubah'   => true,
                'hapus'  => true,
            ],
            konfig: [
                //visible, display, kolom, jenis, required
                [HIDE, 'ID Pre Anestesi',       'id_pre_anestesi',     I::INDEX,  OPTIONAL],
                [SHOW, 'Nomor Registrasi',       'nomor_reg',           I::TEXT,    REQUIRED],
                [SHOW, 'Kode Dokter',            'kode_dokter',         I::TEXT,    REQUIRED],
                [SHOW, 'Waktu Pengkajian',       'waktu_pengkajian',    I::DATE, REQUIRED],
                [SHOW, 'Diagnosa',               'diagnosa',            I::TEXT,    REQUIRED],
                [SHOW, 'Rencana Tindakan',       'rencana_tindakan',    I::TEXT,    REQUIRED],
                [SHOW, 'Tanggal Operasi',        'tanggal_operasi',     I::DATE, REQUIRED],
                [SHOW, 'Tinggi Badan',           'tinggi_badan',        I::NUMBER,  REQUIRED],
                [SHOW, 'Berat Badan',            'berat_badan',         I::NUMBER,  REQUIRED],
                [SHOW, 'Sistolik',               'sistolik',            I::NUMBER,  REQUIRED],
                [SHOW, 'Diastolik',              'diastolik',           I::NUMBER,  REQUIRED],
                [SHOW, 'Saturasi O2',            'saturasi_o2',         I::NUMBER,  REQUIRED],
                [SHOW, 'Nadi',                   'nadi',                I::NUMBER,  REQUIRED],
                [SHOW, 'Suhu',                   'suhu',                'suhu',    REQUIRED],
                [SHOW, 'Pernapasan',             'pernapasan',          I::NUMBER,  REQUIRED],
                [SHOW, 'Fisik Cardiovascular',   'fisik_cardiovascular',I::TEXT,    REQUIRED],
                [SHOW, 'Fisik Paru',             'fisik_paru',          I::TEXT,    REQUIRED],
                [SHOW, 'Fisik Abdomen',          'fisik_abdomen',       I::TEXT,    REQUIRED],
                [SHOW, 'Fisik Ekstrimitas',      'fisik_extrimitas',    I::TEXT,    REQUIRED],
                [SHOW, 'Fisik Endokrin',         'fisik_endokrin',      I::TEXT,    REQUIRED],
                [SHOW, 'Fisik Ginjal',           'fisik_ginjal',        I::TEXT,    REQUIRED],
                [SHOW, 'Fisik Obat-obatan',      'fisik_obat_obatan',   I::TEXT,    REQUIRED],
                [SHOW, 'Fisik Laboratorium',     'fisik_laboratorium',  I::TEXT,    REQUIRED],
                [SHOW, 'Fisik Penunjang',        'fisik_penunjang',     I::TEXT,    REQUIRED],
                [SHOW, 'Alergi Obat',            'alergi_obat',         I::TEXT,    REQUIRED],
                [SHOW, 'Alergi Lainnya',         'alergi_lainnya',      I::TEXT,    REQUIRED],
                [SHOW, 'Riwayat Terapi',         'riwayat_terapi',      I::TEXT,    REQUIRED],
                [SHOW, 'Merokok',                'is_merokok',          I::SELECT,  REQUIRED],
                [SHOW, 'Jumlah Rokok',           'jumlah_rokok',        I::NUMBER,  REQUIRED],
                [SHOW, 'Alkohol',                'is_alkohol',          I::SELECT,  REQUIRED],
                [SHOW, 'Jumlah Alkohol',         'jumlah_alkohol',      I::NUMBER,  REQUIRED],
                [SHOW, 'Obat Bebas',             'id_obat_bebas',       I::INDEX,  REQUIRED],
                [SHOW, 'Keterangan Obat',        'ket_obat',            I::TEXT,    REQUIRED],
                [SHOW, 'Riwayat Cardiovascular', 'rw_cardiovascular',   I::TEXT,    REQUIRED],
                [SHOW, 'Riwayat Respiratory',    'rw_respiratory',      I::TEXT,    REQUIRED],
                [SHOW, 'Riwayat Endocrine',      'rw_endocrine',        I::TEXT,    REQUIRED],
                [SHOW, 'Riwayat Lainnya',        'rw_lainnya',          I::TEXT,    REQUIRED],
                [SHOW, 'Rencana Anestesi',       'id_rencana_anestesi', I::INDEX,  REQUIRED],
                [SHOW, 'ASA',                    'id_asa',              I::INDEX,  REQUIRED],
                [SHOW, 'Waktu Puasa',            'waktu_puasa',         I::TIME,     REQUIRED],
                [SHOW, 'Rencana Perawatan',      'rencana_perawatan',   I::TEXT,    REQUIRED],
                [SHOW, 'Catatan Khusus',         'catatan_khusus',      I::TEXT,    REQUIRED],
            ],
        );
    }
}