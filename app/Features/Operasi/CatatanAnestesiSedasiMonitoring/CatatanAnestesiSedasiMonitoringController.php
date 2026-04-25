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
                //visible, display, kolom, jenis, required
                [HIDE, 'ID Monitoring',      'id_monitoring',       I::INDEX, OPTIONAL],
                [HIDE, 'ID Catatan Anestesi','id_catatan_anestesi', I::INDEX, OPTIONAL],
                [SHOW, 'Nama Monitoring',    'nama_monitoring',     I::TEXT,   REQUIRED],
                [SHOW, 'Digunakan',          'is_digunakan',        I::SELECT, REQUIRED],
                [SHOW, 'Keterangan',         'keterangan',          I::TEXT,   REQUIRED],
            ],
        );
    }
}