<?php
declare(strict_types=1);

namespace App\Features\Laboratorium\PermintaanLabPa;
use App\Core\Controller\ControllerTemplate;

class PermintaanLabPaController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new PermintaanLabPaModel(),
            breadcrumbs: [
                ['title' => 'Laboratorium', 'icon' => 'laboratorium'],
                ['title' => 'Permintaan Lab PA', 'icon' => 'permintaan_lab_pa'],
            ],
            judul: 'Permintaan Lab PA',
            aksi: [
                'tambah' => true,
                'audit'  => true,
                'ubah'   => true,
                'hapus'  => true,
            ],
            konfig: [
                [0, 'ID Permintaan PA',           'id_permintaan_pa',            'indeks',  0],
                [1, 'ID Permintaan Lab',          'id_permintaan_lab',           'indeks',  1],
                [1, 'Tanggal Pengambilan Bahan',  'tgl_pengambilan_bahan',       'tanggal', 1],
                [1, 'Metode Diperoleh',           'metode_diperoleh',            'teks',    1],
                [1, 'Lokasi Jaringan',            'lokasi_jaringan',             'teks',    1],
                [1, 'Bahan Pengawet',             'bahan_pengawet',              'teks',    1],
                [1, 'Riwayat Lokasi Lab',         'riwayat_lokasi_lab',          'teks',    1],
                [1, 'Riwayat Tanggal Sebelumnya', 'riwayat_tgl_sebelumnya',      'tanggal', 1],
                [1, 'Riwayat No. PA Sebelumnya',  'riwayat_no_pa_sebelumnya',    'teks',    1],
                [1, 'Riwayat Diagnosa Sebelumnya','riwayat_diagnosa_sebelumnya', 'teks',    1],
                [1, 'ID Item Pemeriksaan',        'id_item_pemeriksaan',         'indeks',  1],
            ],
        );
    }
}