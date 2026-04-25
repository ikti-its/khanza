<?php
declare(strict_types=1);

namespace App\Features\Radiologi\PermintaanRad;
use App\Core\Controller\ControllerTemplate;

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
                [0, 'ID Permintaan',       'id_permintaan',        'indeks',  0],
                [1, 'No. Permintaan',      'no_permintaan',        'teks',    1],
                [1, 'Nomor Registrasi',    'nomor_reg',            'teks',    1],
                [1, 'Kode Dokter Perujuk', 'kode_dokter_perujuk',  'teks',    1],
                [1, 'Tanggal Permintaan',  'tgl_jam_permintaan',   'tanggal', 1],
                [1, 'Informasi Tambahan',  'informasi_tambahan',   'teks',    1],
                [1, 'Indikasi Klinis',     'indikasi_klinis',      'teks',    1],
                [1, 'Status Permintaan',   'id_status_permintaan', 'status',  1],
                [1, 'Item Radiologi',      'id_item_rad',          'status',  1],
            ],
        );
    }
}