<?php
declare(strict_types=1);

namespace App\Features\Operasi\RefHubunganKeluarga;
use App\Core\Controller\ControllerTemplate;

class RefHubunganKeluargaController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new RefHubunganKeluargaModel(),
            breadcrumbs: [
                ['title' => 'Operasi', 'icon' => 'operasi'],
                ['title' => 'Referensi Hubungan Keluarga', 'icon' => 'ref_hubungan_keluarga'],
            ],
            judul: 'Referensi Hubungan Keluarga',
            aksi: [
                'tambah' => false,
                'audit'  => false,
                'ubah'   => false,
                'hapus'  => false,
            ],
            konfig: [
                //visible, display, kolom, jenis, required
                [0, 'ID Hubungan Keluarga', 'id_hubungan_keluarga', 'indeks', 0],
                [1, 'Nama Hubungan',        'nama_hubungan',        'teks',   1],
            ],
        );
    }
}