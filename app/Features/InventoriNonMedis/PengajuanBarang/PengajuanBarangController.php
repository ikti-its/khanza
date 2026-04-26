<?php
declare(strict_types=1);

namespace App\Features\InventoriNonMedis\PengajuanBarang;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;
use App\Core\Controller\ActionType as A;

final class PengajuanBarangController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new PengajuanBarangModel(),
            breadcrumbs: [
                ['title' => 'Inventori Non Medis', 'icon' => 'inventori_non_medis'],
                ['title' => 'Pengajuan Barang',    'icon' => 'pengajuan_barang'],
            ],
            title: 'Pengajuan Barang',
            action: [
                A::CREATE,
                // A::AUDIT,
                A::UPDATE,
                A::DELETE,,
            ],
            fields: [
                [HIDE, OPTIONAL, I::INDEX, 'id_pengajuan', 'ID Pengajuan'],
                [HIDE, OPTIONAL, I::INDEX, 'id_permintaan', 'ID Permintaan'],
                [SHOW, REQUIRED, I::DATE,  'tanggal','Tanggal'],
                [SHOW, OPTIONAL, I::SELECT,'status', 'Status'],
                [SHOW, OPTIONAL, I::TEXT, 'catatan', 'Catatan'],
                [SHOW, OPTIONAL, I::TEXT, 'catatan_atasan', 'Catatan Atasan'],
            ],
        );
    }
}
