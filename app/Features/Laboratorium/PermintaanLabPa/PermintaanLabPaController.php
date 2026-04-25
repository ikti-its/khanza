<?php
declare(strict_types=1);

namespace App\Features\Laboratorium\PermintaanLabPa;
use App\Core\Controller\ControllerTemplate;

final class PermintaanLabPaController extends ControllerTemplate
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
                [HIDE, 'ID Permintaan PA',           'id_permintaan_pa',            'indeks',  OPTIONAL],
                [SHOW, 'ID Permintaan Lab',          'id_permintaan_lab',           'indeks',  REQUIRED],
                [SHOW, 'Tanggal Pengambilan Bahan',  'tgl_pengambilan_bahan',       'tanggal', REQUIRED],
                [SHOW, 'Metode Diperoleh',           'metode_diperoleh',            'teks',    REQUIRED],
                [SHOW, 'Lokasi Jaringan',            'lokasi_jaringan',             'teks',    REQUIRED],
                [SHOW, 'Bahan Pengawet',             'bahan_pengawet',              'teks',    REQUIRED],
                [SHOW, 'Riwayat Lokasi Lab',         'riwayat_lokasi_lab',          'teks',    REQUIRED],
                [SHOW, 'Riwayat Tanggal Sebelumnya', 'riwayat_tgl_sebelumnya',      'tanggal', REQUIRED],
                [SHOW, 'Riwayat No. PA Sebelumnya',  'riwayat_no_pa_sebelumnya',    'teks',    REQUIRED],
                [SHOW, 'Riwayat Diagnosa Sebelumnya','riwayat_diagnosa_sebelumnya', 'teks',    REQUIRED],
                [SHOW, 'ID Item Pemeriksaan',        'id_item_pemeriksaan',         'indeks',  REQUIRED],
            ],
        );
    }
}