<?php
declare(strict_types=1);

namespace App\Features\Laboratorium\PermintaanLabPa;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

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
                [HIDE, 'ID Permintaan PA',           'id_permintaan_pa',            I::INDEX,  OPTIONAL],
                [SHOW, 'ID Permintaan Lab',          'id_permintaan_lab',           I::INDEX,  REQUIRED],
                [SHOW, 'Tanggal Pengambilan Bahan',  'tgl_pengambilan_bahan',       I::DATE, REQUIRED],
                [SHOW, 'Metode Diperoleh',           'metode_diperoleh',            I::TEXT,    REQUIRED],
                [SHOW, 'Lokasi Jaringan',            'lokasi_jaringan',             I::TEXT,    REQUIRED],
                [SHOW, 'Bahan Pengawet',             'bahan_pengawet',              I::TEXT,    REQUIRED],
                [SHOW, 'Riwayat Lokasi Lab',         'riwayat_lokasi_lab',          I::TEXT,    REQUIRED],
                [SHOW, 'Riwayat Tanggal Sebelumnya', 'riwayat_tgl_sebelumnya',      I::DATE, REQUIRED],
                [SHOW, 'Riwayat No. PA Sebelumnya',  'riwayat_no_pa_sebelumnya',    I::TEXT,    REQUIRED],
                [SHOW, 'Riwayat Diagnosa Sebelumnya','riwayat_diagnosa_sebelumnya', I::TEXT,    REQUIRED],
                [SHOW, 'ID Item Pemeriksaan',        'id_item_pemeriksaan',         I::INDEX,  REQUIRED],
            ],
        );
    }
}