<?php
declare(strict_types=1);

namespace App\Features\Donor\PengambilanDarah;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class PengambilanDarahModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            new PengambilanDarahDatabase(),
            'BASE',
            'donor',
            'pengambilan_darah',
            'id_pengambilan_darah',
            [
                'id_pengambilan_darah'  => V::DEFAULT(),
                'nomor_pengambilan'     => V::DEFAULT(),
                'tanggal_pengambilan'   => V::DEFAULT(),
                'no_bag'                => V::DEFAULT()
            ],
            [
                'id_kunjungan'          => ['nomor_kunjungan'],
                'id_shift'              => ['nama_shift'],
                'id_jenis_bag'          => ['nama_jenis_bag'],
                'id_jenis_donor'        => ['nama_jenis_donor'],
                'id_lokasi_pengambilan' => ['nama_lokasi'],
                'id_petugas'            => [''],
                'id_status_pengambilan' => ['nama_status_pengambilan']
            ],
        );
    }
}