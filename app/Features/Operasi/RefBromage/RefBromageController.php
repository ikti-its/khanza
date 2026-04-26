<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefBromage;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class RefBromageController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            new RefBromageModel(),
            [
                ['Operasi', 'operasi'],
                ['Referensi Bromage', 'ref_bromage'],
            ],
            'Referensi Bromage',
            [
                // A::CREATE,
                // A::AUDIT,
                // A::UPDATE,
                // A::DELETE,,
            ],
            [
                [HIDE, OPTIONAL, I::INDEX, 'id_bromage', 'ID Bromage'],
                [SHOW, REQUIRED, I::TEXT, 'nama_skala', 'Nama Skala'],
                [SHOW, REQUIRED, I::TEXT, 'tingkat_blok', 'Tingkat Blok'],
                [SHOW, REQUIRED, I::NUMBER, 'nilai', 'Nilai'],
                [SHOW, OPTIONAL, I::TEXT, 'gambar', 'Gambar'],
            ],
        );
    }
}