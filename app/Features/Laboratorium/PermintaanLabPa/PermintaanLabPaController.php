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
                [HIDE, OPTIONAL, I::INDEX, 'id_permintaan_pa', 'ID Permintaan PA'],
                [SHOW, REQUIRED, I::INDEX, 'id_permintaan_lab', 'ID Permintaan Lab'],
                [SHOW, REQUIRED, I::DATE, 'tgl_pengambilan_bahan', 'Tanggal Pengambilan Bahan'],
                [SHOW, REQUIRED, I::TEXT, 'metode_diperoleh', 'Metode Diperoleh'],
                [SHOW, REQUIRED, I::TEXT, 'lokasi_jaringan', 'Lokasi Jaringan'],
                [SHOW, REQUIRED, I::TEXT, 'bahan_pengawet', 'Bahan Pengawet'],
                [SHOW, REQUIRED, I::TEXT, 'riwayat_lokasi_lab', 'Riwayat Lokasi Lab'],
                [SHOW, REQUIRED, I::DATE, 'riwayat_tgl_sebelumnya', 'Riwayat Tanggal Sebelumnya'],
                [SHOW, REQUIRED, I::TEXT, 'riwayat_no_pa_sebelumnya', 'Riwayat No. PA Sebelumnya'],
                [SHOW, REQUIRED, I::TEXT, 'riwayat_diagnosa_sebelumnya', 'Riwayat Diagnosa Sebelumnya'],
                [SHOW, REQUIRED, I::INDEX, 'id_item_pemeriksaan', 'ID Item Pemeriksaan'],
            ],
        );
    }
}