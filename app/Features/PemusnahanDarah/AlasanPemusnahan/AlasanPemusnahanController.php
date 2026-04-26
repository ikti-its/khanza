<?php
declare(strict_types=1);

namespace App\Features\PemusnahanDarah\AlasanPemusnahan;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class AlasanPemusnahanController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            model: new AlasanPemusnahanModel(),
            breadcrumbs: [
                ['title' => 'Pemusnahan Darah', 'icon' => 'pemusnahan_darah'],
                ['title' => 'Alasan Pemusnahan', 'icon' => 'alasan_pemusnahan'],
            ],
            title: 'Alasan Pemusnahan',
            action: [
                'tambah' => false,
                'audit'  => false,
                'ubah'   => false, 
                'hapus'  => false
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_alasan', 'ID Alasan'],
                [SHOW, REQUIRED, I::TEXT, 'nama_alasan', 'Nama Alasan Pemusnahan'],
            ],
        );
    }   
}