<?php

declare(strict_types=1);

namespace App\Features\InventoriNonMedis\PermintaanBarang;

use App\Core\Model\ModelTemplate;
use App\Core\Model\ValidationType as V;

final class PermintaanBarangModel extends ModelTemplate
{
    public function __construct()
    {
        parent::__construct(
            new PermintaanBarangDatabase(),
            [
                'id_permintaan'             => V::DEFAULT(),
                'no_permintaan'             => V::DEFAULT(),
                'tanggal'                   => V::DEFAULT(),
                'boleh_pengiriman_sebagian' => V::DEFAULT(),
                // Ditulis oleh sampel() (lihat PermintaanBarangController): Petugas RS
                // mengajukan pembatalan dari halaman miliknya sendiri, TANPA menyentuh
                // kolom status — keputusan tetap milik Staf Gudang di modul Persetujuan.
                'pengajuan_pembatalan' => V::DEFAULT(),
                'alasan_pembatalan'    => V::DEFAULT(),
                'tanggal_pembatalan'   => V::DEFAULT(),
            ],
            [
                'petugas'          => ['id_orang' => ['nama']],
                'petugas_gudang'   => ['id_orang' => ['nama']],
                'petugas_penerima' => ['id_orang' => ['nama']],
                // Wajib ada supaya kartu Riwayat Pengajuan Pembatalan di
                // detail_permintaan_barang.php bisa menampilkan nama pemutus
                // (petugas_gudang_pembatalan_nama) — sebelumnya hilang dari
                // daftar join ini sehingga alias itu selalu undefined dan
                // kartu jatuh ke fallback "Menunggu Persetujuan" walau
                // keputusan (setuju/tolak) sudah dibuat.
                'petugas_gudang_pembatalan'   => ['id_orang' => ['nama']],
                'master_ruangan'              => ['nama_ruangan'],
                'id_status_permintaan_barang' => ['nama_status_permintaan_barang'],
            ],
        );
    }

    // Batasi pilihan status hanya Draf (1) dan Proses Permintaan (4)
    #[\Override]
    public function get_all_options(): array
    {
        $options = parent::get_all_options();

        if (isset($options['id_status_permintaan_barang'])) {
            $options['id_status_permintaan_barang'] = array_values(array_filter($options['id_status_permintaan_barang'], fn(array $opt) => in_array(
                $opt[1],
                ['1', '4'],
                true,
            )));
        }

        return $options;
    }
}
