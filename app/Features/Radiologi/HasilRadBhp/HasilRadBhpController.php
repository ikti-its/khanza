<?php
declare(strict_types=1);

namespace App\Features\Radiologi\HasilRadBhp;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class HasilRadBhpController extends ControllerTemplate
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
                [HIDE, 'ID Radiologi BHP', 'id_rad_bhp',      'indeks', OPTIONAL],
                [SHOW, 'ID Hasil Rad',     'id_hasil_rad',    'indeks', REQUIRED],
                [SHOW, 'ID Barang Medis',  'id_barang_medis', 'indeks', REQUIRED],
                [SHOW, 'Jumlah Pakai',     'jumlah_pakai',    'jumlah', REQUIRED],
                [SHOW, 'Satuan',           'satuan',          'teks',   REQUIRED],
                [SHOW, 'Harga Satuan',     'harga_satuan',    'uang',   REQUIRED],
            ],
        );
    }
}