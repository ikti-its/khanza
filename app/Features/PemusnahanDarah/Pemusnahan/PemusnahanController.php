<?php
declare(strict_types=1);

namespace App\Features\PemusnahanDarah\Pemusnahan;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class PemusnahanController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            model: new PemusnahanModel(),
            breadcrumbs: [
                ['title' => 'Pemusnahan Darah', 'icon' => 'pemusnahan_darah'],
                ['title' => 'Pemusnahan', 'icon' => 'pemusnahan'],
            ],
            title: 'Pemusnahan',
            action: [
                'tambah' => true,
                'audit'  => true,
                'ubah'   => false, 
                'hapus'  => true
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_pemusnahan', 'ID Pemusnahan'],
                [SHOW, REQUIRED, I::DATE, 'tanggal_pemusnahan', 'Tanggal Pemusnahan'],
                [SHOW, REQUIRED, I::INDEX, 'id_petugas', 'ID Petugas'],
                [SHOW, OPTIONAL, I::TEXT, 'keterangan', 'Keterangan'],
            ],
        );
    }   
}