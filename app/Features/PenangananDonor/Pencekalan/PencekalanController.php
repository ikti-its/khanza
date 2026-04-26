<?php
declare(strict_types=1);

namespace App\Features\PenangananDonor\Pencekalan;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class PencekalanController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            model: new PencekalanModel(),
            breadcrumbs: [
                ['title' => 'Penanganan Donor', 'icon' => 'penanganan_donor'],
                ['title' => 'Pencekalan', 'icon' => 'pencekalan'],
            ],
            title: 'Pencekalan',
            action: [
                'tambah' => true,
                'audit'  => true,
                'ubah'   => true, 
                'hapus'  => true
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_pencekalan', 'ID Pencekalan'],
                [SHOW, REQUIRED, I::INDEX, 'id_kunjungan', 'ID Kunjungan'],
                [SHOW, REQUIRED, I::INDEX, 'id_jenis_pencekalan', 'ID Jenis Pencekalan'],
                [SHOW, REQUIRED, I::DATE, 'tanggal_mulai', 'Tanggal Mulai'],
                [SHOW, OPTIONAL, I::DATE, 'tanggal_selesai', 'Tanggal Selesai'],
                [HIDE, REQUIRED, I::INDEX, 'id_shift', 'ID Shift'],
                [HIDE, REQUIRED, I::INDEX, 'id_petugas', 'ID Petugas'],
                [SHOW, REQUIRED, I::TEXT, 'keterangan', 'Keterangan'],
                [SHOW, REQUIRED, I::SELECT, 'id_status_pencekalan', 'ID Status Pencekalan'],
            ],
        );
    }   
}