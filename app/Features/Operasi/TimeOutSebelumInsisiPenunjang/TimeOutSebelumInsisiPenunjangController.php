<?php
declare(strict_types=1);

namespace App\Features\Operasi\TimeOutSebelumInsisiPenunjang;
use App\Core\Controller\ControllerTemplate;

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
                [0, 'ID Penunjang',  'id_penunjang',   'indeks', 0],
                [0, 'ID Time Out',   'id_timeout',     'indeks', 0],
                [1, 'Jenis Penunjang','jenis_penunjang','teks',   1],
                [1, 'Status',        'id_status',      'indeks', 1],
            ],
        );
    }
}