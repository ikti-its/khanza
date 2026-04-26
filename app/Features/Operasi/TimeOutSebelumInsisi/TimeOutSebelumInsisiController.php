<?php
declare(strict_types=1);

namespace App\Features\Operasi\TimeOutSebelumInsisi;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class TimeOutSebelumInsisiController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            new TimeOutSebelumInsisiModel(),
            [
                ['Operasi', 'operasi'],
                ['Time Out Sebelum Insisi', 'time_out_sebelum_insisi'],
            ],
            'Time Out Sebelum Insisi',
            [
                A::CREATE,
                A::AUDIT,
                A::UPDATE,
                A::DELETE,,
            ],
            [
                [HIDE, OPTIONAL, I::INDEX, 'id_timeout', 'ID Time Out'],
                [SHOW, REQUIRED, I::TEXT, 'nomor_reg', 'Nomor Registrasi'],
                [SHOW, REQUIRED, I::DATE, 'waktu_timeout', 'Waktu Time Out'],
                [SHOW, REQUIRED, I::TEXT, 'sn_cn', 'SN/CN'],
                [SHOW, REQUIRED, I::TEXT, 'kode_dokter_bedah', 'Kode Dokter Bedah'],
                [SHOW, REQUIRED, I::TEXT, 'kode_dokter_anestesi', 'Kode Dokter Anestesi'],
                [SHOW, REQUIRED, I::TEXT, 'tindakan', 'Tindakan'],
                [SHOW, REQUIRED, I::SELECT, 'is_identitas_sesuai', 'Identitas Sesuai'],
                [SHOW, REQUIRED, I::SELECT, 'is_tindakan_sesuai', 'Tindakan Sesuai'],
                [SHOW, REQUIRED, I::SELECT, 'is_area_insisi_sesuai', 'Area Insisi Sesuai'],
                [SHOW, REQUIRED, I::INDEX, 'id_penandaan_area', 'Penandaan Area'],
                [SHOW, REQUIRED, I::NUMBER, 'perkiraan_waktu_jam', 'Perkiraan Waktu (jam)'],
                [SHOW, REQUIRED, I::SELECT, 'is_antibiotik', 'Antibiotik'],
                [SHOW, REQUIRED, I::TEXT, 'nama_antibiotik', 'Nama Antibiotik'],
                [SHOW, REQUIRED, I::TIME, 'waktu_antibiotik', 'Waktu Antibiotik'],
                [SHOW, REQUIRED, I::TEXT, 'antisipasi_hilang_darah', 'Antisipasi Hilang Darah'],
                [SHOW, REQUIRED, I::INDEX, 'id_hal_khusus', 'Hal Khusus'],
                [SHOW, REQUIRED, I::TEXT, 'keterangan_hal_khusus', 'Keterangan Hal Khusus'],
                [SHOW, REQUIRED, I::DATE, 'tanggal_steril', 'Tanggal Steril'],
                [SHOW, REQUIRED, I::SELECT, 'is_steril_dikonfirmasi', 'Steril Dikonfirmasi'],
                [SHOW, REQUIRED, I::SELECT, 'is_verifikasi_preop', 'Verifikasi Pre Op'],
                [SHOW, REQUIRED, I::TEXT, 'id_perawat_ok', 'ID Perawat OK'],
            ],
        );
    }
}