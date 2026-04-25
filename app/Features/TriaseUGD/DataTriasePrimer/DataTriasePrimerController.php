<?php
declare(strict_types=1);

namespace App\Features\TriaseUGD\DataTriasePrimer;
use App\Core\Controller\ControllerTemplate;

final class DataTriasePrimerController extends ControllerTemplate
{
    public function __construct(){
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
                [HIDE, 'ID Triase Primer', 'id_triase_primer', 'indeks', OPTIONAL],
                [SHOW, 'ID Triase', 'id_triase', 'indeks', REQUIRED],
                [HIDE, 'Keluhan Utama', 'keluhan_utama', 'teks', REQUIRED],
                [HIDE, 'ID Kebutuhan Khusus', 'id_kebutuhan_khusus', 'indeks', REQUIRED],
                [HIDE, 'Catatan', 'catatan', 'teks', REQUIRED],
                [SHOW, 'ID Plan Primer', 'id_plan_primer', 'indeks', REQUIRED],
                [SHOW, 'Tanggal Triase', 'tanggal_triase', 'tanggal_jam', REQUIRED],
                [SHOW, 'ID Petugas', 'id_petugas', 'indeks', REQUIRED],
            ],
        );
    }   
}