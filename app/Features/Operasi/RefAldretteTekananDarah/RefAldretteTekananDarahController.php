<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefAldretteTekananDarah;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class RefAldretteTekananDarahController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new RefAldretteTekananDarahModel(),
            breadcrumbs: [
                ['title' => 'Operasi', 'icon' => 'operasi'],
                ['title' => 'Referensi Aldrette Tekanan Darah', 'icon' => 'ref_aldrette_tekanan_darah'],
            ],
            judul: 'Referensi Aldrette Tekanan Darah',
            aksi: [
                'tambah' => false,
                'audit'  => false,
                'ubah'   => false,
                'hapus'  => false,
            ],
            konfig: [
                //visible, display, kolom, jenis, required
                [HIDE, OPTIONAL, I::INDEX, 'id_td', 'ID Tekanan Darah'],
                [SHOW, REQUIRED, I::TEXT, 'nama_skala', 'Nama Skala'],
                [SHOW, REQUIRED, I::NUMBER, 'nilai', 'Nilai'],
            ],
        );
    }
}