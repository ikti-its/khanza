<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefBromage;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class RefBromageController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new RefBromageModel(),
            breadcrumbs: [
                ['title' => 'Operasi', 'icon' => 'operasi'],
                ['title' => 'Referensi Bromage', 'icon' => 'ref_bromage'],
            ],
            title: 'Referensi Bromage',
            action: [
                'tambah' => false,
                'audit'  => false,
                'ubah'   => false,
                'hapus'  => false,
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_bromage', 'ID Bromage'],
                [SHOW, REQUIRED, I::TEXT, 'nama_skala', 'Nama Skala'],
                [SHOW, REQUIRED, I::TEXT, 'tingkat_blok', 'Tingkat Blok'],
                [SHOW, REQUIRED, I::NUMBER, 'nilai', 'Nilai'],
                [SHOW, OPTIONAL, I::TEXT, 'gambar', 'Gambar'],
            ],
        );
    }
}