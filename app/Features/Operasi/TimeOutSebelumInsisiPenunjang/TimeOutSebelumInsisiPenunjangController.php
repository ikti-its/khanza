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
                //visible, display, kolom, jenis, required
                [HIDE, 'ID Penunjang',  'id_penunjang',   I::INDEX, OPTIONAL],
                [HIDE, 'ID Time Out',   'id_timeout',     I::INDEX, OPTIONAL],
                [SHOW, 'Jenis Penunjang','jenis_penunjang',I::TEXT,   REQUIRED],
                [SHOW, I::SELECT,        'id_status',      I::INDEX, REQUIRED],
            ],
        );
    }
}