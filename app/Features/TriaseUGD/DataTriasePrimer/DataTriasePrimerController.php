<?php
declare(strict_types=1);

namespace App\Features\TriaseUGD\DataTriasePrimer;
use App\Core\Controller\ControllerTemplate;

final class DataTriasePrimerController extends ControllerTemplate
{
    public function __construct(
    ){
        parent::__construct(
            model: new DataTriasePrimerModel(),
            breadcrumbs: [
                ['title' => 'Triase UGD', 'icon' => 'triase_ugd'],
                ['title' => 'Data Triase Primer', 'icon' => 'data_triase_primer'],
            ],
            judul: 'Data Triase Primer',
            aksi: [
                'tambah' => true,
                'audit'  => true,
                'ubah'   => true, 
                'hapus'  => true
            ],
            konfig: [
                //visible, display, kolom, jenis, required, *opsi
                [0, 'ID Triase Primer', 'id_triase_primer', 'indeks', 0],
                [1, 'ID Triase', 'id_triase', 'indeks', 1],
                [0, 'Keluhan Utama', 'keluhan_utama', 'teks', 1],
                [0, 'ID Kebutuhan Khusus', 'id_kebutuhan_khusus', 'indeks', 1],
                [0, 'Catatan', 'catatan', 'teks', 1],
                [1, 'ID Plan Primer', 'id_plan_primer', 'indeks', 1],
                [1, 'Tanggal Triase', 'tanggal_triase', 'tanggal_jam', 1],
                [1, 'ID Petugas', 'id_petugas', 'indeks', 1],
            ],
        );
    }   
}