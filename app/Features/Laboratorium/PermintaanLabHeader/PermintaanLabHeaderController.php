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
                [HIDE, 'ID Permintaan',       'id_permintaan',        I::INDEX,  OPTIONAL],
                [SHOW, 'No. Permintaan',      'no_permintaan',        I::TEXT,    REQUIRED],
                [SHOW, 'Nomor Registrasi',    'nomor_reg',            I::TEXT,    REQUIRED],
                [SHOW, 'Kategori Lab',        'id_kategori_lab',      I::INDEX,  REQUIRED],
                [SHOW, 'Kode Dokter Perujuk', 'kode_dokter_perujuk',  I::TEXT,    REQUIRED],
                [SHOW, 'Tanggal Permintaan',  'tgl_permintaan',       I::DATE, REQUIRED],
                [SHOW, 'Indikasi Klinis',     'indikasi_klinis',      I::TEXT,    REQUIRED],
                [SHOW, 'Informasi Tambahan',  'informasi_tambahan',   I::TEXT,    REQUIRED],
                [SHOW, 'Status Permintaan',   'id_status_permintaan', I::SELECT,  REQUIRED],
            ],
        );
    }
}