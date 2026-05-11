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
            'BASE',
            'operasi',
            'penyerahan_pasien_peralatan',
            'id',
            [
                'id' => V::TODO(),
                'id_penyerahan' => V::TODO(),
                'id_peralatan' => V::TODO(),
                'keterangan' => V::TODO(),
            ],
        );
    }
}