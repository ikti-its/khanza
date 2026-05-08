<?php
declare(strict_types=1);

namespace App\Features\PenangananDonor\Pencekalan;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class PencekalanModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'BASE',
            'penanganan_donor',
            'pencekalan',
            'id_pencekalan',
            [
                'id_pencekalan' => V::TODO(),
                'id_kunjungan' => V::TODO(),
                'id_jenis_pencekalan' => V::TODO(),
                'tanggal_mulai' => V::TODO(),
                'tanggal_selesai' => V::TODO(),
                'id_shift' => V::TODO(),
                'id_petugas' => V::TODO(),
                'keterangan' => V::TODO(),
                'id_status_pencekalan' => V::TODO()
            ],
        );
    }
}