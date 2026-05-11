<?php
declare(strict_types=1);

namespace App\Features\Operasi\PengkajianPreAnestesi;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

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
                'id_pre_anestesi' => V::TODO(),
                'nomor_reg' => V::TODO(),
                'kode_dokter' => V::TODO(),
                'waktu_pengkajian' => V::TODO(),
                'diagnosa' => V::TODO(),
                'rencana_tindakan' => V::TODO(),
                'tanggal_operasi' => V::TODO(),
                'tinggi_badan' => V::TODO(),
                'berat_badan' => V::TODO(),
                'sistolik' => V::TODO(),
                'diastolik' => V::TODO(),
                'saturasi_o2' => V::TODO(),
                'nadi' => V::TODO(),
                'suhu' => V::TODO(),
                'pernapasan' => V::TODO(),
                'fisik_cardiovascular' => V::TODO(),
                'fisik_paru' => V::TODO(),
                'fisik_abdomen' => V::TODO(),
                'fisik_extrimitas' => V::TODO(),
                'fisik_endokrin' => V::TODO(),
                'fisik_ginjal' => V::TODO(),
                'fisik_obat_obatan' => V::TODO(),
                'fisik_laboratorium' => V::TODO(),
                'fisik_penunjang' => V::TODO(),
                'alergi_obat' => V::TODO(),
                'alergi_lainnya' => V::TODO(),
                'riwayat_terapi' => V::TODO(),
                'is_merokok' => V::TODO(),
                'jumlah_rokok' => V::TODO(),
                'is_alkohol' => V::TODO(),
                'jumlah_alkohol' => V::TODO(),
                'id_obat_bebas' => V::TODO(),
                'ket_obat' => V::TODO(),
                'rw_cardiovascular' => V::TODO(),
                'rw_respiratory' => V::TODO(),
                'rw_endocrine' => V::TODO(),
                'rw_lainnya' => V::TODO(),
                'id_rencana_anestesi' => V::TODO(),
                'id_asa' => V::TODO(),
                'waktu_puasa' => V::TODO(),
                'rencana_perawatan' => V::TODO(),
                'catatan_khusus' => V::TODO(),
            ],
        );
    }
}