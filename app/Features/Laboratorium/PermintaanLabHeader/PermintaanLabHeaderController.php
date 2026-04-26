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
            title: 'Permintaan Lab',
            action: [
                'tambah' => true,
                'audit'  => true,
                'ubah'   => true,
                'hapus'  => true,
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_permintaan', 'ID Permintaan'],
                [SHOW, REQUIRED, I::TEXT, 'no_permintaan', 'No. Permintaan'],
                [SHOW, REQUIRED, I::TEXT, 'nomor_reg', 'Nomor Registrasi'],
                [SHOW, REQUIRED, I::INDEX, 'id_kategori_lab', 'Kategori Lab'],
                [SHOW, REQUIRED, I::TEXT, 'kode_dokter_perujuk', 'Kode Dokter Perujuk'],
                [SHOW, REQUIRED, I::DATE, 'tgl_permintaan', 'Tanggal Permintaan'],
                [SHOW, REQUIRED, I::TEXT, 'indikasi_klinis', 'Indikasi Klinis'],
                [SHOW, REQUIRED, I::TEXT, 'informasi_tambahan', 'Informasi Tambahan'],
                [SHOW, REQUIRED, I::SELECT, 'id_status_permintaan', 'Status Permintaan'],
            ],
        );
    }
}