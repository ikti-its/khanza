<?php
declare(strict_types=1);

namespace App\Features\Operasi\TimeOutSebelumInsisiPenunjang;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

final class TimeOutSebelumInsisiPenunjangController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new TimeOutSebelumInsisiPenunjangModel(),
            breadcrumbs: [
                ['title' => 'Operasi', 'icon' => 'operasi'],
                ['title' => 'Time Out Sebelum Insisi Penunjang', 'icon' => 'time_out_sebelum_insisi_penunjang'],
            ],
            judul: 'Time Out Sebelum Insisi Penunjang',
            aksi: [
                'tambah' => true,
                'audit'  => true,
                'ubah'   => true,
                'hapus'  => true,
            ],
            konfig: [
                [HIDE, OPTIONAL, I::INDEX, 'id_penunjang', 'ID Penunjang'],
                [HIDE, OPTIONAL, I::INDEX, 'id_timeout', 'ID Time Out'],
                [SHOW, REQUIRED, I::TEXT, 'jenis_penunjang', 'Jenis Penunjang'],
                [SHOW, REQUIRED, I::INDEX,'id_status', 'Status'],
            ],
        );
    }
}