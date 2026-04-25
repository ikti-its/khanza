<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefPeralatanTransfer;
use App\Core\Controller\ControllerTemplate;

final class RefPeralatanTransferController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new RefPeralatanTransferModel(),
            breadcrumbs: [
                ['title' => 'Operasi', 'icon' => 'operasi'],
                ['title' => 'Referensi Peralatan Transfer', 'icon' => 'ref_peralatan_transfer'],
            ],
            judul: 'Referensi Peralatan Transfer',
            aksi: [
                'tambah' => false,
                'audit'  => false,
                'ubah'   => false,
                'hapus'  => false,
            ],
            konfig: [
                //visible, display, kolom, jenis, required
                [HIDE, 'ID Peralatan',   'id_peralatan',   'indeks', OPTIONAL],
                [SHOW, 'Nama Peralatan', 'nama_peralatan', 'teks',   REQUIRED],
            ],
        );
    }
}