<?php
declare(strict_types=1);

namespace App\Features\Operasi\PengkajianPreop;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

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
                [HIDE, 'ID Pengkajian',            'id_pengkajian',            I::INDEX,   OPTIONAL],
                [SHOW, 'Nomor Registrasi',         'nomor_reg',                I::TEXT,     REQUIRED],
                [SHOW, 'Kode Dokter Bedah',        'kode_dokter_bedah',        I::TEXT,     REQUIRED],
                [SHOW, 'Waktu Pengkajian',         'waktu_pengkajian',         I::TIME,      REQUIRED],
                [SHOW, 'Ringkasan Klinik',         'ringkasan_klinik',         I::TEXT,     REQUIRED],
                [SHOW, 'Pemeriksaan Fisik',        'pemeriksaan_fisik',        I::TEXT,     REQUIRED],
                [SHOW, 'Pemeriksaan Diagnostik',   'pemeriksaan_diagnostik',   I::TEXT,     REQUIRED],
                [SHOW, 'Diagnosa Pre-Operasi',     'diagnosa_pre_operasi',     I::TEXT,     REQUIRED],
                [SHOW, 'Rencana Tindakan',         'rencana_tindakan',         I::TEXT,     REQUIRED],
                [SHOW, 'Persiapan Khusus',         'persiapan_khusus',         I::TEXT,     REQUIRED],
                [SHOW, 'Terapi Pre-Operasi',       'terapi_pre_operasi',       I::TEXT,     REQUIRED],
            ],
        );
    }
}