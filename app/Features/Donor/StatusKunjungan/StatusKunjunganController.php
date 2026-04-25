<?php
declare(strict_types=1);

namespace App\Features\Donor\StatusKunjungan;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class StatusKunjunganController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            model: new StatusKunjunganModel(),
            breadcrumbs: [
                ['title' => 'Donor', 'icon' => 'donor'],
                ['title' => 'Status Kunjungan', 'icon' => 'status_kunjungan'],
            ],
            judul: 'Status Kunjungan',
            aksi: [
                'tambah' => false,
                'audit'  => false,
                'ubah'   => false, 
                'hapus'  => false
            ],
            konfig: [
                //visible, display, kolom, jenis, required, *opsi
                [HIDE, 'ID Status Kunjungan', 'id_status_kunjungan', 'indeks', OPTIONAL],
                [SHOW, 'Nama Status Kunjungan', 'nama_status_kunjungan', 'teks', REQUIRED],
            ],
        );
    }   
}