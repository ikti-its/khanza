<?php
declare(strict_types=1);

namespace App\Features\Laboratorium\HasilLabPk;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class HasilLabPkController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new HasilLabPkModel(),
            breadcrumbs: [
                ['Laboratorium', 'laboratorium'],
                ['Hasil Lab PK', 'hasil_lab_pk'],
            ],
            title: 'Hasil Lab PK',
            action: [
                A::CREATE,
                A::AUDIT,
                A::UPDATE,
                A::DELETE,,
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_hasil_pk', 'ID Hasil PK'],
                [SHOW, REQUIRED, I::INDEX, 'id_permintaan_lab', 'ID Permintaan Lab'],
                [SHOW, REQUIRED, I::TEXT, 'nomor_reg', 'Nomor Registrasi'],
                [SHOW, REQUIRED, I::TEXT, 'kode_dokter_pj', 'Kode Dokter PJ'],
                [SHOW, REQUIRED, I::TEXT, 'id_petugas_lab', 'ID Petugas Lab'],
                [SHOW, REQUIRED, I::TEXT, 'kode_dokter_perujuk', 'Kode Dokter Perujuk'],
                [SHOW, REQUIRED, I::DATE, 'tgl_jam_hasil', 'Tanggal & Jam Hasil'],
                [SHOW, REQUIRED, I::INDEX, 'id_kategori_usia', 'ID Kategori Usia'],
                [SHOW, REQUIRED, I::INDEX, 'id_item_pemeriksaan', 'ID Item Pemeriksaan'],
                [SHOW, REQUIRED, I::INDEX, 'id_parameter_pemeriksaan', 'ID Parameter Pemeriksaan'],
                [SHOW, REQUIRED, I::TEXT, 'nilai_hasil', 'Nilai Hasil'],
                [SHOW, OPTIONAL, I::TEXT, 'keterangan_hasil', 'Keterangan Hasil'],
            ],
        );
    }
}