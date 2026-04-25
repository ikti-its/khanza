<?php
declare(strict_types=1);

namespace App\Features\Radiologi\PermintaanRad;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class PermintaanRadController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new PermintaanRadModel(),
            breadcrumbs: [
                ['title' => 'Radiologi', 'icon' => 'radiologi'],
                ['title' => 'Permintaan Radiologi', 'icon' => 'permintaan_rad'],
            ],
            judul: 'Permintaan Radiologi',
            aksi: [
                'tambah' => true,
                'audit'  => true,
                'ubah'   => true,
                'hapus'  => true,
            ],
            konfig: [
                //visible, display, kolom, jenis, required
                [HIDE, 'ID Permintaan',       'id_permintaan',        I::INDEX,  OPTIONAL],
                [SHOW, 'No. Permintaan',      'no_permintaan',        I::TEXT,    REQUIRED],
                [SHOW, 'Nomor Registrasi',    'nomor_reg',            I::TEXT,    REQUIRED],
                [SHOW, 'Kode Dokter Perujuk', 'kode_dokter_perujuk',  I::TEXT,    REQUIRED],
                [SHOW, 'Tanggal Permintaan',  'tgl_jam_permintaan',   I::DATE, REQUIRED],
                [SHOW, 'Informasi Tambahan',  'informasi_tambahan',   I::TEXT,    REQUIRED],
                [SHOW, 'Indikasi Klinis',     'indikasi_klinis',      I::TEXT,    REQUIRED],
                [SHOW, 'Status Permintaan',   'id_status_permintaan', I::SELECT,  REQUIRED],
                [SHOW, 'Item Radiologi',      'id_item_rad',          I::SELECT,  REQUIRED],
            ],
        );
    }
}