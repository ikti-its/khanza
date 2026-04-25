<?php
declare(strict_types=1);

namespace App\Features\Operasi\CatatanAnestesiSedasiMonitoring;
use App\Core\Controller\ControllerTemplate;

final class CatatanAnestesiSedasiMonitoringController extends ControllerTemplate
{
    public function __construct()
    {
        parent::__construct(
            model: new CatatanAnestesiSedasiMonitoringModel(),
            breadcrumbs: [
                ['title' => 'Operasi', 'icon' => 'operasi'],
                ['title' => 'Catatan Anestesi Sedasi Monitoring', 'icon' => 'catatan_anestesi_sedasi_monitoring'],
            ],
            judul: 'Catatan Anestesi Sedasi Monitoring',
            aksi: [
                'tambah' => true,
                'audit'  => true,
                'ubah'   => true,
                'hapus'  => true,
            ],
            konfig: [
                //visible, display, kolom, jenis, required
                [0, 'ID Monitoring',      'id_monitoring',       'indeks', 0],
                [0, 'ID Catatan Anestesi','id_catatan_anestesi', 'indeks', 0],
                [1, 'Nama Monitoring',    'nama_monitoring',     'teks',   1],
                [1, 'Digunakan',          'is_digunakan',        'status', 1],
                [1, 'Keterangan',         'keterangan',          'teks',   1],
            ],
        );
    }
}