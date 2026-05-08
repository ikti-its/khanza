<?php
declare(strict_types=1);

namespace App\Features\DistribusiDarah\PenyerahanDarah;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class PenyerahanDarahModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'BASE',
            'distribusi_darah',
            'penyerahan_darah',
            'id_penyerahan',
            [
                'id_penyerahan' => V::TODO(),
                'id_permintaan' => V::TODO(),
                'no_penyerahan' => V::TODO(),
                'tanggal_penyerahan' => V::TODO(),
                'id_shift' => V::TODO(),
                'id_petugas_cross' => V::TODO(),
                'keterangan' => V::TODO(),
                'id_status_pembayaran' => V::TODO(),
                'id_rekening' => V::TODO(),
                'pengambil_darah' => V::TODO(),
                'alamat_pengambil' => V::TODO(),
                'id_penanggung_jawab' => V::TODO(),
                'besar_ppn' => V::TODO()
            ],
        );
    }
}