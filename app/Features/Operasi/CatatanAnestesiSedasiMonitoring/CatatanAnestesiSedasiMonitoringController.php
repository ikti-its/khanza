<?php
declare(strict_types=1);

namespace App\Features\Operasi\CatatanAnestesiSedasiMonitoring;
use App\Core\Controller\ControllerTemplate;
use App\Core\Controller\InputType as I;

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
                [HIDE, OPTIONAL, I::INDEX, 'id_monitoring', 'ID Monitoring'],
                [HIDE, OPTIONAL, I::INDEX, 'id_catatan_anestesi', 'ID Catatan Anestesi'],
                [SHOW, REQUIRED, I::TEXT, 'nama_monitoring', 'Nama Monitoring'],
                [SHOW, REQUIRED, I::SELECT, 'is_digunakan', 'Digunakan'],
                [SHOW, REQUIRED, I::TEXT, 'keterangan', 'Keterangan'],
            ],
        );
    }
}