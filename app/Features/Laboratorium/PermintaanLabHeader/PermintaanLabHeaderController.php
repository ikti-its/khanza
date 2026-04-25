<?php
declare(strict_types=1);

namespace App\Features\Laboratorium\PermintaanLabHeader;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

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
                [HIDE, 'ID Permintaan',       'id_permintaan',        'indeks',  OPTIONAL],
                [SHOW, 'No. Permintaan',      'no_permintaan',        'teks',    REQUIRED],
                [SHOW, 'Nomor Registrasi',    'nomor_reg',            'teks',    REQUIRED],
                [SHOW, 'Kategori Lab',        'id_kategori_lab',      'indeks',  REQUIRED],
                [SHOW, 'Kode Dokter Perujuk', 'kode_dokter_perujuk',  'teks',    REQUIRED],
                [SHOW, 'Tanggal Permintaan',  'tgl_permintaan',       'tanggal', REQUIRED],
                [SHOW, 'Indikasi Klinis',     'indikasi_klinis',      'teks',    REQUIRED],
                [SHOW, 'Informasi Tambahan',  'informasi_tambahan',   'teks',    REQUIRED],
                [SHOW, 'Status Permintaan',   'id_status_permintaan', 'status',  REQUIRED],
            ],
        );
    }
}