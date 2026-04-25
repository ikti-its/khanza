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
                [0, 'ID Pengkajian',            'id_pengkajian',            'indeks',   0],
                [1, 'Nomor Registrasi',         'nomor_reg',                'teks',     1],
                [1, 'Kode Dokter Bedah',        'kode_dokter_bedah',        'teks',     1],
                [1, 'Waktu Pengkajian',         'waktu_pengkajian',         'jam',      1],
                [1, 'Ringkasan Klinik',         'ringkasan_klinik',         'teks',     1],
                [1, 'Pemeriksaan Fisik',        'pemeriksaan_fisik',        'teks',     1],
                [1, 'Pemeriksaan Diagnostik',   'pemeriksaan_diagnostik',   'teks',     1],
                [1, 'Diagnosa Pre-Operasi',     'diagnosa_pre_operasi',     'teks',     1],
                [1, 'Rencana Tindakan',         'rencana_tindakan',         'teks',     1],
                [1, 'Persiapan Khusus',         'persiapan_khusus',         'teks',     1],
                [1, 'Terapi Pre-Operasi',       'terapi_pre_operasi',       'teks',     1],
            ],
        );
    }
}