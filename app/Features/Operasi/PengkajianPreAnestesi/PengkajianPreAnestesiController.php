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
                [0, 'ID Pre Anestesi',       'id_pre_anestesi',     'indeks',  0],
                [1, 'Nomor Registrasi',       'nomor_reg',           'teks',    1],
                [1, 'Kode Dokter',            'kode_dokter',         'teks',    1],
                [1, 'Waktu Pengkajian',       'waktu_pengkajian',    'tanggal', 1],
                [1, 'Diagnosa',               'diagnosa',            'teks',    1],
                [1, 'Rencana Tindakan',       'rencana_tindakan',    'teks',    1],
                [1, 'Tanggal Operasi',        'tanggal_operasi',     'tanggal', 1],
                [1, 'Tinggi Badan',           'tinggi_badan',        'jumlah',  1],
                [1, 'Berat Badan',            'berat_badan',         'jumlah',  1],
                [1, 'Sistolik',               'sistolik',            'jumlah',  1],
                [1, 'Diastolik',              'diastolik',           'jumlah',  1],
                [1, 'Saturasi O2',            'saturasi_o2',         'jumlah',  1],
                [1, 'Nadi',                   'nadi',                'jumlah',  1],
                [1, 'Suhu',                   'suhu',                'suhu',    1],
                [1, 'Pernapasan',             'pernapasan',          'jumlah',  1],
                [1, 'Fisik Cardiovascular',   'fisik_cardiovascular','teks',    1],
                [1, 'Fisik Paru',             'fisik_paru',          'teks',    1],
                [1, 'Fisik Abdomen',          'fisik_abdomen',       'teks',    1],
                [1, 'Fisik Ekstrimitas',      'fisik_extrimitas',    'teks',    1],
                [1, 'Fisik Endokrin',         'fisik_endokrin',      'teks',    1],
                [1, 'Fisik Ginjal',           'fisik_ginjal',        'teks',    1],
                [1, 'Fisik Obat-obatan',      'fisik_obat_obatan',   'teks',    1],
                [1, 'Fisik Laboratorium',     'fisik_laboratorium',  'teks',    1],
                [1, 'Fisik Penunjang',        'fisik_penunjang',     'teks',    1],
                [1, 'Alergi Obat',            'alergi_obat',         'teks',    1],
                [1, 'Alergi Lainnya',         'alergi_lainnya',      'teks',    1],
                [1, 'Riwayat Terapi',         'riwayat_terapi',      'teks',    1],
                [1, 'Merokok',                'is_merokok',          'status',  1],
                [1, 'Jumlah Rokok',           'jumlah_rokok',        'jumlah',  1],
                [1, 'Alkohol',                'is_alkohol',          'status',  1],
                [1, 'Jumlah Alkohol',         'jumlah_alkohol',      'jumlah',  1],
                [1, 'Obat Bebas',             'id_obat_bebas',       'indeks',  1],
                [1, 'Keterangan Obat',        'ket_obat',            'teks',    1],
                [1, 'Riwayat Cardiovascular', 'rw_cardiovascular',   'teks',    1],
                [1, 'Riwayat Respiratory',    'rw_respiratory',      'teks',    1],
                [1, 'Riwayat Endocrine',      'rw_endocrine',        'teks',    1],
                [1, 'Riwayat Lainnya',        'rw_lainnya',          'teks',    1],
                [1, 'Rencana Anestesi',       'id_rencana_anestesi', 'indeks',  1],
                [1, 'ASA',                    'id_asa',              'indeks',  1],
                [1, 'Waktu Puasa',            'waktu_puasa',         'jam',     1],
                [1, 'Rencana Perawatan',      'rencana_perawatan',   'teks',    1],
                [1, 'Catatan Khusus',         'catatan_khusus',      'teks',    1],
            ],
        );
    }
}