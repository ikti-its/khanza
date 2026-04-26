<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefKesiapanAnestesi;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class RefKesiapanAnestesiController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new RefKesiapanAnestesiModel(),
            breadcrumbs: [
                ['title' => 'Operasi', 'icon' => 'operasi'],
                ['title' => 'Referensi Kesiapan Anestesi', 'icon' => 'ref_kesiapan_anestesi'],
            ],
            title: 'Referensi Kesiapan Anestesi',
            action: [
                'tambah' => false,
                'audit'  => false,
                'ubah'   => false,
                'hapus'  => false,
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_kesiapan', 'ID Kesiapan'],
                [SHOW, REQUIRED, I::TEXT, 'nama_kesiapan', 'Nama Kesiapan'],
            ],
        );
    }
}