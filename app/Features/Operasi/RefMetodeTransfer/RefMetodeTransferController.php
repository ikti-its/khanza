<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefMetodeTransfer;
use App\Core\Controller\ControllerTemplate;

final class RefMetodeTransferController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new RefMetodeTransferModel(),
            breadcrumbs: [
                ['title' => 'Operasi', 'icon' => 'operasi'],
                ['title' => 'Referensi Metode Transfer', 'icon' => 'ref_metode_transfer'],
            ],
            judul: 'Referensi Metode Transfer',
            aksi: [
                'tambah' => false,
                'audit'  => false,
                'ubah'   => false,
                'hapus'  => false,
            ],
            konfig: [
                //visible, display, kolom, jenis, required
                [0, 'ID Metode',   'id_metode',   'indeks', 0],
                [1, 'Nama Metode', 'nama_metode', 'teks',   1],
            ],
        );
    }
}