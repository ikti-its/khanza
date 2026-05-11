<?php
declare(strict_types=1);

namespace App\Features\Operasi\CatatanAnestesiSedasiAlat;
use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class CatatanAnestesiSedasiAlatModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            'BASE',
            'operasi',
            'catatan_anestesi_sedasi_alat',
            'id_alat',
            [
                'id_alat' => V::TODO(),
                'id_catatan_anestesi' => V::TODO(),
                'nama_alat' => V::TODO(),
                'is_digunakan' => V::TODO(),
                'keterangan' => V::TODO(),
            ],
        );
    }
}