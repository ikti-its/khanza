<?php
declare(strict_types=1);

namespace App\Features\Operasi\PengkajianPreAnestesi;
use App\Core\Model\ModelTemplate;

final class PengkajianPreAnestesiModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            'BASE',
            'operasi',
            'pengkajian_pre_anestesi',
            'id_pre_anestesi',
            [
                'id_pre_anestesi' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'nomor_reg' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'kode_dokter' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'waktu_pengkajian' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'diagnosa' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'rencana_tindakan' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'tanggal_operasi' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'tinggi_badan' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'berat_badan' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'sistolik' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'diastolik' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'saturasi_o2' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'nadi' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'suhu' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'pernapasan' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'fisik_cardiovascular' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'fisik_paru' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'fisik_abdomen' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'fisik_extrimitas' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'fisik_endokrin' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'fisik_ginjal' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'fisik_obat_obatan' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'fisik_laboratorium' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'fisik_penunjang' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'alergi_obat' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'alergi_lainnya' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'riwayat_terapi' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'is_merokok' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'jumlah_rokok' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'is_alkohol' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'jumlah_alkohol' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'id_obat_bebas' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'ket_obat' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'rw_cardiovascular' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'rw_respiratory' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'rw_endocrine' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'rw_lainnya' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'id_rencana_anestesi' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'id_asa' => [
                    'allowed' => false,
                    'rules' => '',
                    'errors' => [],
                ],
                'waktu_puasa' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'rencana_perawatan' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
                'catatan_khusus' => [
                    'allowed' => true,
                    'rules' => '',
                    'errors' => [],
                ],
            ],
        );
    }
}