<?php
declare(strict_types=1);

namespace App\Features\Operasi\PengkajianPreAnestesi;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class PengkajianPreAnestesiController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new PengkajianPreAnestesiModel(),
            breadcrumbs: [
                ['title' => 'Operasi', 'icon' => 'operasi'],
                ['title' => 'Pengkajian Pre Anestesi', 'icon' => 'pengkajian_pre_anestesi'],
            ],
            title: 'Pengkajian Pre Anestesi',
            action: [
                A::CREATE,
                A::AUDIT,
                A::UPDATE,
                A::DELETE,,
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_pre_anestesi', 'ID Pre Anestesi'],
                [SHOW, REQUIRED, I::TEXT, 'nomor_reg', 'Nomor Registrasi'],
                [SHOW, REQUIRED, I::TEXT, 'kode_dokter', 'Kode Dokter'],
                [SHOW, REQUIRED, I::DATE, 'waktu_pengkajian', 'Waktu Pengkajian'],
                [SHOW, REQUIRED, I::TEXT, 'diagnosa', 'Diagnosa'],
                [SHOW, REQUIRED, I::TEXT, 'rencana_tindakan', 'Rencana Tindakan'],
                [SHOW, REQUIRED, I::DATE, 'tanggal_operasi', 'Tanggal Operasi'],
                [SHOW, REQUIRED, I::NUMBER, 'tinggi_badan', 'Tinggi Badan'],
                [SHOW, REQUIRED, I::NUMBER, 'berat_badan', 'Berat Badan'],
                [SHOW, REQUIRED, I::NUMBER, 'sistolik', 'Sistolik'],
                [SHOW, REQUIRED, I::NUMBER, 'diastolik', 'Diastolik'],
                [SHOW, REQUIRED, I::NUMBER, 'saturasi_o2', 'Saturasi O2'],
                [SHOW, REQUIRED, I::NUMBER, 'nadi', 'Nadi'],
                [SHOW, REQUIRED, I::TEMP, 'suhu', 'Suhu'],
                [SHOW, REQUIRED, I::NUMBER, 'pernapasan', 'Pernapasan'],
                [SHOW, REQUIRED, I::TEXT, 'fisik_cardiovascular', 'Fisik Cardiovascular'],
                [SHOW, REQUIRED, I::TEXT, 'fisik_paru', 'Fisik Paru'],
                [SHOW, REQUIRED, I::TEXT, 'fisik_abdomen', 'Fisik Abdomen'],
                [SHOW, REQUIRED, I::TEXT, 'fisik_extrimitas', 'Fisik Ekstrimitas'],
                [SHOW, REQUIRED, I::TEXT, 'fisik_endokrin', 'Fisik Endokrin'],
                [SHOW, REQUIRED, I::TEXT, 'fisik_ginjal', 'Fisik Ginjal'],
                [SHOW, REQUIRED, I::TEXT, 'fisik_obat_obatan', 'Fisik Obat-obatan'],
                [SHOW, REQUIRED, I::TEXT, 'fisik_laboratorium', 'Fisik Laboratorium'],
                [SHOW, REQUIRED, I::TEXT, 'fisik_penunjang', 'Fisik Penunjang'],
                [SHOW, REQUIRED, I::TEXT, 'alergi_obat', 'Alergi Obat'],
                [SHOW, REQUIRED, I::TEXT, 'alergi_lainnya', 'Alergi Lainnya'],
                [SHOW, REQUIRED, I::TEXT, 'riwayat_terapi', 'Riwayat Terapi'],
                [SHOW, REQUIRED, I::SELECT, 'is_merokok', 'Merokok'],
                [SHOW, REQUIRED, I::NUMBER, 'jumlah_rokok', 'Jumlah Rokok'],
                [SHOW, REQUIRED, I::SELECT, 'is_alkohol', 'Alkohol'],
                [SHOW, REQUIRED, I::NUMBER, 'jumlah_alkohol', 'Jumlah Alkohol'],
                [SHOW, REQUIRED, I::INDEX, 'id_obat_bebas', 'Obat Bebas'],
                [SHOW, REQUIRED, I::TEXT, 'ket_obat', 'Keterangan Obat'],
                [SHOW, REQUIRED, I::TEXT, 'rw_cardiovascular', 'Riwayat Cardiovascular'],
                [SHOW, REQUIRED, I::TEXT, 'rw_respiratory', 'Riwayat Respiratory'],
                [SHOW, REQUIRED, I::TEXT, 'rw_endocrine', 'Riwayat Endocrine'],
                [SHOW, REQUIRED, I::TEXT, 'rw_lainnya', 'Riwayat Lainnya'],
                [SHOW, REQUIRED, I::INDEX, 'id_rencana_anestesi', 'Rencana Anestesi'],
                [SHOW, REQUIRED, I::INDEX, 'id_asa', 'ASA'],
                [SHOW, REQUIRED, I::TIME, 'waktu_puasa', 'Waktu Puasa'],
                [SHOW, REQUIRED, I::TEXT, 'rencana_perawatan', 'Rencana Perawatan'],
                [SHOW, REQUIRED, I::TEXT, 'catatan_khusus', 'Catatan Khusus'],
            ],
        );
    }
}