<?php
declare(strict_types=1);

namespace App\Features\Darah\Rhesus;
use App\Core\Controller\ControllerTemplate;

final class RhesusController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            model: new RhesusModel(),
            breadcrumbs: [
                ['title' => 'Darah', 'icon' => 'darah'],
                ['title' => 'Rhesus', 'icon' => 'rhesus'],
            ],
            judul: 'Rhesus',
            aksi: [
                'tambah' => false,
                'audit'  => false,
                'ubah'   => false, 
                'hapus'  => false
            ],
            konfig: [
                //visible, display, kolom, jenis, required, *opsi
                [HIDE, 'ID Rhesus', 'id_rhesus', 'indeks', OPTIONAL],
                [SHOW, 'Kode Rhesus', 'kode_rhesus', 'teks', REQUIRED],
            ],
        );
    }   
}