<?php
declare(strict_types=1);

namespace App\Features\Operasi\PenyerahanPasienPeralatan;

use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class PenyerahanPasienPeralatanModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            new PenyerahanPasienPeralatanDatabase(),
            'BASE',
            'operasi',
            'penyerahan_pasien_peralatan',
            'id',
            [
                'id'            => V::DEFAULT(),
                'id_penyerahan' => V::DEFAULT(),
                'id_peralatan'  => V::DEFAULT(),
                'keterangan'    => V::DEFAULT(),
            ],
            [
                'id_penyerahan' => [],
                'id_peralatan'  => ['nama_peralatan'],
            ],
        );
    }
}
