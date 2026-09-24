<?php

declare(strict_types=1);

namespace App\Features\InventoriNonMedis\PengembalianBarang;

use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class PengembalianBarangModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            new PengembalianBarangDatabase(),
            [
                'id_pengembalian'    => V::DEFAULT(),
                'no_pengembalian'    => V::DEFAULT(),
                'tanggal'            => V::DEFAULT(),
                'alasan'             => V::DEFAULT(),
                'tanggal_verifikasi' => V::DEFAULT(),
                'catatan_verifikasi' => V::DEFAULT(),
            ],
            [
                // Urutan menentukan alias kolom 'nama' hasil join (lihat
                // ModelTemplate::compute_leaf_aliases()): petugas → 'nama',
                // petugas_gudang → 'petugas_gudang_nama'.
                'petugas'                       => ['id_orang' => ['nama']],
                'petugas_gudang'                => ['id_orang' => ['nama']],
                'id_permintaan'                 => ['no_permintaan'],
                'master_ruangan'                => ['nama_ruangan'],
                'id_status_pengembalian_barang' => ['nama_status_pengembalian_barang'],
            ],
        );
    }
}
