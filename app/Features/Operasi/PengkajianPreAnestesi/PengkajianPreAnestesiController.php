<?php
declare(strict_types=1);

namespace App\Features\Operasi\PengkajianPreAnestesi;
use App\Core\Controller\ControllerTemplate;

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
                [HIDE, 'ID Pre Anestesi',       'id_pre_anestesi',     'indeks',  OPTIONAL],
                [SHOW, 'Nomor Registrasi',       'nomor_reg',           'teks',    REQUIRED],
                [SHOW, 'Kode Dokter',            'kode_dokter',         'teks',    REQUIRED],
                [SHOW, 'Waktu Pengkajian',       'waktu_pengkajian',    'tanggal', REQUIRED],
                [SHOW, 'Diagnosa',               'diagnosa',            'teks',    REQUIRED],
                [SHOW, 'Rencana Tindakan',       'rencana_tindakan',    'teks',    REQUIRED],
                [SHOW, 'Tanggal Operasi',        'tanggal_operasi',     'tanggal', REQUIRED],
                [SHOW, 'Tinggi Badan',           'tinggi_badan',        'jumlah',  REQUIRED],
                [SHOW, 'Berat Badan',            'berat_badan',         'jumlah',  REQUIRED],
                [SHOW, 'Sistolik',               'sistolik',            'jumlah',  REQUIRED],
                [SHOW, 'Diastolik',              'diastolik',           'jumlah',  REQUIRED],
                [SHOW, 'Saturasi O2',            'saturasi_o2',         'jumlah',  REQUIRED],
                [SHOW, 'Nadi',                   'nadi',                'jumlah',  REQUIRED],
                [SHOW, 'Suhu',                   'suhu',                'suhu',    REQUIRED],
                [SHOW, 'Pernapasan',             'pernapasan',          'jumlah',  REQUIRED],
                [SHOW, 'Fisik Cardiovascular',   'fisik_cardiovascular','teks',    REQUIRED],
                [SHOW, 'Fisik Paru',             'fisik_paru',          'teks',    REQUIRED],
                [SHOW, 'Fisik Abdomen',          'fisik_abdomen',       'teks',    REQUIRED],
                [SHOW, 'Fisik Ekstrimitas',      'fisik_extrimitas',    'teks',    REQUIRED],
                [SHOW, 'Fisik Endokrin',         'fisik_endokrin',      'teks',    REQUIRED],
                [SHOW, 'Fisik Ginjal',           'fisik_ginjal',        'teks',    REQUIRED],
                [SHOW, 'Fisik Obat-obatan',      'fisik_obat_obatan',   'teks',    REQUIRED],
                [SHOW, 'Fisik Laboratorium',     'fisik_laboratorium',  'teks',    REQUIRED],
                [SHOW, 'Fisik Penunjang',        'fisik_penunjang',     'teks',    REQUIRED],
                [SHOW, 'Alergi Obat',            'alergi_obat',         'teks',    REQUIRED],
                [SHOW, 'Alergi Lainnya',         'alergi_lainnya',      'teks',    REQUIRED],
                [SHOW, 'Riwayat Terapi',         'riwayat_terapi',      'teks',    REQUIRED],
                [SHOW, 'Merokok',                'is_merokok',          'status',  REQUIRED],
                [SHOW, 'Jumlah Rokok',           'jumlah_rokok',        'jumlah',  REQUIRED],
                [SHOW, 'Alkohol',                'is_alkohol',          'status',  REQUIRED],
                [SHOW, 'Jumlah Alkohol',         'jumlah_alkohol',      'jumlah',  REQUIRED],
                [SHOW, 'Obat Bebas',             'id_obat_bebas',       'indeks',  REQUIRED],
                [SHOW, 'Keterangan Obat',        'ket_obat',            'teks',    REQUIRED],
                [SHOW, 'Riwayat Cardiovascular', 'rw_cardiovascular',   'teks',    REQUIRED],
                [SHOW, 'Riwayat Respiratory',    'rw_respiratory',      'teks',    REQUIRED],
                [SHOW, 'Riwayat Endocrine',      'rw_endocrine',        'teks',    REQUIRED],
                [SHOW, 'Riwayat Lainnya',        'rw_lainnya',          'teks',    REQUIRED],
                [SHOW, 'Rencana Anestesi',       'id_rencana_anestesi', 'indeks',  REQUIRED],
                [SHOW, 'ASA',                    'id_asa',              'indeks',  REQUIRED],
                [SHOW, 'Waktu Puasa',            'waktu_puasa',         'jam',     REQUIRED],
                [SHOW, 'Rencana Perawatan',      'rencana_perawatan',   'teks',    REQUIRED],
                [SHOW, 'Catatan Khusus',         'catatan_khusus',      'teks',    REQUIRED],
            ],
        );
    }
}