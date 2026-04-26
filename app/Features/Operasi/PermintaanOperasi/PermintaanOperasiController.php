<?php
declare(strict_types=1);

namespace App\Features\Operasi\PermintaanOperasi;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class PermintaanOperasiController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new PermintaanOperasiModel(),
            breadcrumbs: [
                ['title' => 'Operasi', 'icon' => 'operasi'],
                ['title' => 'Permintaan Operasi', 'icon' => 'permintaan_operasi'],
            ],
            judul: 'Permintaan Operasi',
            aksi: [
                'tambah' => true,
                'audit'  => true,
                'ubah'   => true,
                'hapus'  => true,
            ],
            konfig: [
                //visible, display, kolom, jenis, required
                [HIDE, OPTIONAL, I::INDEX, 'id_permintaan', 'ID Permintaan'],
                [SHOW, REQUIRED, I::TEXT, 'nomor_reg', 'Nomor Registrasi'],
                [SHOW, REQUIRED, I::TEXT, 'kode_dokter', 'Kode Dokter'],
                [SHOW, REQUIRED, I::DATE, 'tanggal_minta', 'Tanggal Minta'],
                [SHOW, REQUIRED, I::SELECT, 'is_cito', 'CITO'],
            ],
        );
    }
}