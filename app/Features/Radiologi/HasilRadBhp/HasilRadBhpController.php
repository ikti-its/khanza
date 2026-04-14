<?php
declare(strict_types=1);

namespace App\Features\Radiologi\HasilRadBhp;
use App\Core\Controller\ControllerTemplate;

class HasilRadBhpController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new HasilRadBhpModel(),
            breadcrumbs: [
                ['title' => 'Radiologi', 'icon' => 'radiologi'],
                ['title' => 'Hasil Radiologi BHP', 'icon' => 'hasil_rad_bhp'],
            ],
            judul: 'Hasil Radiologi BHP',
            aksi: [
                'tambah' => true,
                'audit'  => true,
                'ubah'   => true,
                'hapus'  => true,
            ],
            konfig: [
                //visible, display, kolom, jenis, required
                [0, 'ID Radiologi BHP', 'id_rad_bhp',      'indeks', 0],
                [1, 'ID Hasil Rad',     'id_hasil_rad',    'indeks', 1],
                [1, 'ID Barang Medis',  'id_barang_medis', 'indeks', 1],
                [1, 'Jumlah Pakai',     'jumlah_pakai',    'jumlah', 1],
                [1, 'Satuan',           'satuan',          'teks',   1],
                [1, 'Harga Satuan',     'harga_satuan',    'uang',   1],
            ],
        );
    }
}