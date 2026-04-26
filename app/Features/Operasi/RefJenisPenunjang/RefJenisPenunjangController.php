<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefJenisPenunjang;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class RefJenisPenunjangController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new RefJenisPenunjangModel(),
            breadcrumbs: [
                ['Operasi', 'operasi'],
                ['Referensi Jenis Penunjang', 'ref_jenis_penunjang'],
            ],
            title: 'Referensi Jenis Penunjang',
            action: [
                // A::CREATE,
                // A::AUDIT,
                // A::UPDATE,
                // A::DELETE,,
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_jenis_penunjang', 'ID Jenis Penunjang'],
                [SHOW, REQUIRED, I::TEXT, 'nama_jenis', 'Nama Jenis'],
            ],
        );
    }
}