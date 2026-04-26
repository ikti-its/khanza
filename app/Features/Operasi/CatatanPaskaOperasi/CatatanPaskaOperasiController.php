<?php
declare(strict_types=1);

namespace App\Features\Operasi\CatatanPaskaOperasi;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class CatatanPaskaOperasiController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new CatatanPaskaOperasiModel(),
            breadcrumbs: [
                ['title' => 'Operasi', 'icon' => 'operasi'],
                ['title' => 'Catatan Paska Operasi', 'icon' => 'catatan_paska_operasi'],
            ],
            title: 'Catatan Paska Operasi',
            action: [
                'tambah' => true,
                'audit'  => true,
                'ubah'   => true,
                'hapus'  => true,
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_catatan_paska', 'ID Catatan Paska'],
                [SHOW, REQUIRED, I::TEXT, 'nomor_reg', 'Nomor Registrasi'],
                [SHOW, REQUIRED, I::TEXT, 'kode_dokter_bedah', 'Kode Dokter Bedah'],
                [SHOW, REQUIRED, I::DATE, 'waktu_penilaian', 'Waktu Penilaian'],
                [SHOW, REQUIRED, I::TEXT, 'instruksi_rawat', 'Instruksi Rawat'],
                [SHOW, REQUIRED, I::TEXT, 'instruksi_cairan', 'Instruksi Cairan'],
                [SHOW, REQUIRED, I::TEXT, 'instruksi_antibiotik', 'Instruksi Antibiotik'],
                [SHOW, REQUIRED, I::TEXT, 'instruksi_analgetik', 'Instruksi Analgetik'],
                [SHOW, REQUIRED, I::TEXT, 'instruksi_medikamentosa', 'Instruksi Medikamentosa'],
                [SHOW, REQUIRED, I::TEXT, 'instruksi_diet', 'Instruksi Diet'],
                [SHOW, REQUIRED, I::TEXT, 'instruksi_penunjang', 'Instruksi Penunjang'],
                [SHOW, REQUIRED, I::TEXT, 'instruksi_transfusi', 'Instruksi Transfusi'],
                [SHOW, REQUIRED, I::TEXT, 'instruksi_lainnya', 'Instruksi Lainnya'],
            ],
        );
    }
}