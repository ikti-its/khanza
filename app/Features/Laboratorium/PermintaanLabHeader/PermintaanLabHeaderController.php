<?php
declare(strict_types=1);

namespace App\Features\Laboratorium\PermintaanLabHeader;
use App\Core\Controller\ControllerTemplate;

final class PermintaanLabHeaderController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new PermintaanLabHeaderModel(),
            breadcrumbs: [
                ['title' => 'Laboratorium', 'icon' => 'laboratorium'],
                ['title' => 'Permintaan Lab', 'icon' => 'permintaan_lab'],
            ],
            judul: 'Permintaan Lab',
            aksi: [
                'tambah' => true,
                'audit'  => true,
                'ubah'   => true,
                'hapus'  => true,
            ],
            konfig: [
                [0, 'ID Permintaan',       'id_permintaan',        'indeks',  0],
                [1, 'No. Permintaan',      'no_permintaan',        'teks',    1],
                [1, 'Nomor Registrasi',    'nomor_reg',            'teks',    1],
                [1, 'Kategori Lab',        'id_kategori_lab',      'indeks',  1],
                [1, 'Kode Dokter Perujuk', 'kode_dokter_perujuk',  'teks',    1],
                [1, 'Tanggal Permintaan',  'tgl_permintaan',       'tanggal', 1],
                [1, 'Indikasi Klinis',     'indikasi_klinis',      'teks',    1],
                [1, 'Informasi Tambahan',  'informasi_tambahan',   'teks',    1],
                [1, 'Status Permintaan',   'id_status_permintaan', 'status',  1],
            ],
        );
    }
}