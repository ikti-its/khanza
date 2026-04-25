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
                [HIDE, 'ID Permintaan',       'id_permintaan',        'indeks',  OPTIONAL],
                [SHOW, 'No. Permintaan',      'no_permintaan',        'teks',    REQUIRED],
                [SHOW, 'Nomor Registrasi',    'nomor_reg',            'teks',    REQUIRED],
                [SHOW, 'Kode Dokter Perujuk', 'kode_dokter_perujuk',  'teks',    REQUIRED],
                [SHOW, 'Tanggal Permintaan',  'tgl_jam_permintaan',   'tanggal', REQUIRED],
                [SHOW, 'Informasi Tambahan',  'informasi_tambahan',   'teks',    REQUIRED],
                [SHOW, 'Indikasi Klinis',     'indikasi_klinis',      'teks',    REQUIRED],
                [SHOW, 'Status Permintaan',   'id_status_permintaan', 'status',  REQUIRED],
                [SHOW, 'Item Radiologi',      'id_item_rad',          'status',  REQUIRED],
            ],
        );
    }
}