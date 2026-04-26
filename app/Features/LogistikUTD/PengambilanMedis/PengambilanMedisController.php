<?php
declare(strict_types=1);

namespace App\Features\LogistikUTD\PengambilanMedis;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class PengambilanMedisController extends ControllerTemplate
{
    public function __construct(){
        parent::__construct(
            model: new PengambilanMedisModel(),
            breadcrumbs: [
                ['Logistik UTD', 'logistik_utd'],
                ['Pengambilan BHP Medis', 'pengambilan_bhp_medis'],
            ],
            title: 'Pengambilan BHP Medis',
            action: [
                // A::CREATE,
                // A::AUDIT,
                // A::UPDATE,
                // A::DELETE,
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_pengambilan_medis', 'ID Pengambilan Medis'],
                [SHOW, REQUIRED, I::INDEX, 'id_barang', 'ID Barang'],
                [SHOW, REQUIRED, I::NUMBER, 'jumlah', 'Jumlah'],
                [SHOW, REQUIRED, I::MONEY, 'harga_beli', 'Harga Beli'],
                [SHOW, REQUIRED, I::TEXT, 'nama_bangsal', 'Nama Bangsal'],
                [SHOW, REQUIRED, I::DTIME, 'tanggal_pengambilan', 'Tanggal Pengambilan'],
                [HIDE, REQUIRED, I::TEXT, 'keterangan', 'Keterangan'],
                [HIDE, OPTIONAL, I::TEXT, 'nomor_batch', 'Nomor Batch'],
                [HIDE, OPTIONAL, I::TEXT, 'nomor_faktur', 'Nomor Faktur'],
            ],
        );
    }   
}