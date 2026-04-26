<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefRuanganOperasi;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class RefRuanganOperasiController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new RefRuanganOperasiModel(),
            breadcrumbs: [
                ['Operasi', 'operasi'],
                ['Referensi Ruangan Operasi', 'ref_ruangan_operasi'],
            ],
            title: 'Referensi Ruangan Operasi',
            action: [
                // A::CREATE,
                // A::AUDIT,
                // A::UPDATE,
                // A::DELETE,,
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_ruangan', 'ID Ruangan'],
                [SHOW, REQUIRED, I::TEXT, 'kode_ruangan', 'Kode Ruangan'],
                [SHOW, REQUIRED, I::TEXT, 'nama_ruangan', 'Nama Ruangan'],
            ],
        );
    }
}