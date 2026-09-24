<?= view('components/modal/modal-table', [
    'modalId'      => 'modalPermintaanPengembalian',
    'modalTitle'   => 'Pilih Permintaan Asal',
    'headers'      => ['No. Permintaan', 'Tanggal', 'Ruangan'],
    'tableId'      => 'permintaanPengembalianTable',
    'searchInputs' => [
        ['id' => 'searchNoPermintaanPengembalian', 'placeholder' => 'Cari no. permintaan...'],
        ['id' => 'searchRuanganPermintaanPengembalian', 'placeholder' => 'Cari ruangan...'],
    ],
    'actions' => [
        ['type' => 'button', 'text' => 'Refresh', 'onclick' => 'open_modalPermintaanPengembalian()', 'icon' => 'refresh'],
    ],
]) ?>

<script>
    // Hanya permintaan hasil PengembalianBarangController::permintaan_eligible(),
    // terbaru dulu. Halaman pemakai mendefinisikan pilihPermintaanPengembalian(item).
    document.addEventListener("DOMContentLoaded", function () {
        initModalList({
            modalId:     'modalPermintaanPengembalian',
            tableId:     'permintaanPengembalianTable',
            url:         '<?= site_url('inventori-non-medis/pengembalian-barang/modal/list') ?>',
            fields:      ['no_permintaan', 'tanggal', 'nama_ruangan'],
            searchIds: {
                searchNoPermintaanPengembalian:      'no_permintaan',
                searchRuanganPermintaanPengembalian: 'nama_ruangan',
            },
            rowsPerPage: 10,
            onSelect: (item) => {
                if (typeof pilihPermintaanPengembalian === 'function') {
                    pilihPermintaanPengembalian(item);
                }
            },
        });
    });
</script>
