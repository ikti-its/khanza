<?php
declare(strict_types=1);

namespace App\Features\LogistikUTD\PengambilanPenunjang;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class PengambilanPenunjangController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            model: new PengambilanPenunjangModel(),
            breadcrumbs: [
                ['title' => 'Logistik UTD', 'icon' => 'logistik_utd'],
                ['title' => 'Pengambilan BHP Non Medis', 'icon' => 'pengambilan_bhp_non_medis'],
            ],
            title: 'Pengambilan BHP Non Medis',
            action: [
                // A::CREATE,
                // A::AUDIT,
                // A::UPDATE,
                // A::DELETE,
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_pengambilan_penunjang', 'ID Pengambilan Penunjang'],
                [SHOW, REQUIRED, I::INDEX, 'id_barang', 'ID Barang'],
                [SHOW, REQUIRED, I::NUMBER, 'jumlah', 'Jumlah'],
                [SHOW, REQUIRED, I::MONEY, 'harga_beli', 'Harga Beli'],
                [HIDE, REQUIRED, I::INDEX, 'id_petugas_gudang', 'ID Petugas Gudang'],
                [SHOW, REQUIRED, I::DTIME, 'tanggal_pengambilan', 'Tanggal Pengambilan'],
                [HIDE, REQUIRED, I::TEXT, 'keterangan', 'Keterangan'],
            ],
        );
    }   
}