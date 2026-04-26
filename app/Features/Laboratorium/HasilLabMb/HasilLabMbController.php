<?php
declare(strict_types=1);

namespace App\Features\Laboratorium\HasilLabMb;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class HasilLabMbController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new HasilLabMbModel(),
            breadcrumbs: [
                ['title' => 'Laboratorium', 'icon' => 'laboratorium'],
                ['title' => 'Hasil Lab MB', 'icon' => 'hasil_lab_mb'],
            ],
            title: 'Hasil Lab MB',
            action: [
                'tambah' => true,
                'audit'  => true,
                'ubah'   => true,
                'hapus'  => true,
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_hasil_mb', 'ID Hasil MB'],
                [SHOW, REQUIRED, I::INDEX, 'id_permintaan_lab', 'ID Permintaan Lab'],
                [SHOW, REQUIRED, I::TEXT, 'nomor_reg', 'Nomor Registrasi'],
                [SHOW, REQUIRED, I::TEXT, 'kode_dokter_pj', 'Kode Dokter PJ'],
                [SHOW, REQUIRED, I::TEXT, 'id_petugas_lab', 'ID Petugas Lab'],
                [SHOW, REQUIRED, I::TEXT, 'kode_dokter_perujuk', 'Kode Dokter Perujuk'],
                [SHOW, REQUIRED, I::DATE, 'tgl_jam_hasil', 'Tanggal & Jam Hasil'],
                [SHOW, REQUIRED, I::INDEX, 'id_item_pemeriksaan', 'ID Item Pemeriksaan'],
                [SHOW, REQUIRED, I::INDEX, 'id_parameter_pemeriksaan', 'ID Parameter Pemeriksaan'],
                [SHOW, REQUIRED, I::TEXT, 'nilai_hasil', 'Nilai Hasil'],
                [SHOW, REQUIRED, I::TEXT, 'keterangan_hasil', 'Keterangan Hasil'],
            ],
        );
    }
}