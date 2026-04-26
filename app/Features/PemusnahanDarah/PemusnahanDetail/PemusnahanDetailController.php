<?php
declare(strict_types=1);

namespace App\Features\PemusnahanDarah\PemusnahanDetail;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class PemusnahanDetailController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            model: new PemusnahanDetailModel(),
            breadcrumbs: [
                ['title' => 'Pemusnahan Darah', 'icon' => 'pemusnahan_darah'],
                ['title' => 'Pemusnahan Detail', 'icon' => 'pemusnahan_detail'],
            ],
            title: 'Pemusnahan Detail',
            action: [
                'tambah' => true,
                'audit'  => true,
                'ubah'   => false, 
                'hapus'  => true
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_pemusnahan_detail', 'ID Pemusnahan Detail'],
                [SHOW, REQUIRED, I::INDEX, 'id_pemusnahan', 'ID Pemusnahan'],
                [SHOW, REQUIRED, I::INDEX, 'id_stok_darah', 'ID Stok Darah'],
                [SHOW, REQUIRED, I::INDEX, 'id_alasan', 'ID Alasan'],
            ],
        );
    }   
}