<?php
declare(strict_types=1);

namespace App\Features\TriaseUGD\DataTriaseSekunder;
use App\Core\Controller\ControllerTemplate;

final class DataTriaseSekunderController extends ControllerTemplate
{
    public function __construct(
    ){
        parent::__construct(
            model: new DataTriaseSekunderModel(),
            breadcrumbs: [
                ['title' => 'Triase UGD', 'icon' => 'triase_ugd'],
                ['title' => 'Data Triase Sekunder', 'icon' => 'data_triase_sekunder'],
            ],
            judul: 'Data Triase Sekunder',
            aksi: [
                'tambah' => true,
                'audit'  => true,
                'ubah'   => true, 
                'hapus'  => true
            ],
            konfig: [
                //visible, display, kolom, jenis, required, *opsi
                [0, 'ID Triase Sekunder', 'id_triase_sekunder', 'indeks', 0],
                [1, 'ID Triase', 'id_triase', 'indeks', 1],
                [0, 'Anamnesa Singkat', 'anamnesa_singkat', 'teks', 1],
                [0, 'Catatan', 'catatan', 'teks', 1],
                [1, 'ID Plan Sekunder', 'id_plan_sekunder', 'indeks', 1],
                [1, 'Tanggal Triase', 'tanggal_triase', 'tanggal_jam', 1],
                [1, 'ID Petugas', 'id_petugas', 'indeks', 1],
            ],
        );
    }   
}