<?php
declare(strict_types=1);

namespace App\Features\Operasi\PengkajianPreop;
use App\Core\Controller\ControllerTemplate;

final class PengkajianPreopController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new PengkajianPreopModel(),
            breadcrumbs: [
                ['title' => 'Operasi', 'icon' => 'operasi'],
                ['title' => 'Pengkajian Pre-Operasi', 'icon' => 'pengkajian_pre_op'],
            ],
            judul: 'Pengkajian Pre-Operasi',
            aksi: [
                'tambah' => true,
                'audit'  => true,
                'ubah'   => true,
                'hapus'  => true,
            ],
            konfig: [
                //visible, display, kolom, jenis, required
                [HIDE, 'ID Pengkajian',            'id_pengkajian',            'indeks',   OPTIONAL],
                [SHOW, 'Nomor Registrasi',         'nomor_reg',                'teks',     REQUIRED],
                [SHOW, 'Kode Dokter Bedah',        'kode_dokter_bedah',        'teks',     REQUIRED],
                [SHOW, 'Waktu Pengkajian',         'waktu_pengkajian',         'jam',      REQUIRED],
                [SHOW, 'Ringkasan Klinik',         'ringkasan_klinik',         'teks',     REQUIRED],
                [SHOW, 'Pemeriksaan Fisik',        'pemeriksaan_fisik',        'teks',     REQUIRED],
                [SHOW, 'Pemeriksaan Diagnostik',   'pemeriksaan_diagnostik',   'teks',     REQUIRED],
                [SHOW, 'Diagnosa Pre-Operasi',     'diagnosa_pre_operasi',     'teks',     REQUIRED],
                [SHOW, 'Rencana Tindakan',         'rencana_tindakan',         'teks',     REQUIRED],
                [SHOW, 'Persiapan Khusus',         'persiapan_khusus',         'teks',     REQUIRED],
                [SHOW, 'Terapi Pre-Operasi',       'terapi_pre_operasi',       'teks',     REQUIRED],
            ],
        );
    }
}