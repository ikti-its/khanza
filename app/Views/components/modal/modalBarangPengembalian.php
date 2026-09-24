<?= view('components/modal/modal-table', [
    'modalId'      => 'modalBarangPengembalian',
    'modalTitle'   => 'Pilih Barang yang Dikembalikan',
    'headers'      => ['Kode', 'Nama Barang', 'Satuan', 'Qty Keluar', 'Sudah Dikembalikan', 'Sisa'],
    'tableId'      => 'barangPengembalianTable',
    'searchInputs' => [
        ['id' => 'searchKodeBarangPengembalian', 'placeholder' => 'Cari kode barang...'],
        ['id' => 'searchNamaBarangPengembalian', 'placeholder' => 'Cari nama barang...'],
    ],
    'actions' => [
        ['type' => 'button', 'text' => 'Refresh', 'onclick' => 'open_modalBarangPengembalian()', 'icon' => 'refresh'],
    ],
]) ?>

<script>
    // Barang dengan sisa kuota > 0 untuk permintaan yang sedang dipilih di form
    // (input #id_permintaan). URL berupa fungsi supaya dievaluasi ulang setiap
    // modal dibuka. Halaman pemakai mendefinisikan tambahBarangPengembalian(item).
    document.addEventListener("DOMContentLoaded", function () {
        initModalList({
            modalId:     'modalBarangPengembalian',
            tableId:     'barangPengembalianTable',
            url:         () => '<?= site_url('inventori-non-medis/pengembalian-barang/modal/list') ?>?id_permintaan='
                             + encodeURIComponent(document.getElementById('id_permintaan')?.value || '0'),
            fields:      ['kode_barang', 'nama_barang', 'nama_satuan', 'qty_keluar', 'sudah_dikembalikan', 'sisa'],
            searchIds: {
                searchKodeBarangPengembalian: 'kode_barang',
                searchNamaBarangPengembalian: 'nama_barang',
            },
            rowsPerPage: 10,
            emptyText:   'Semua barang dari permintaan ini sudah dikembalikan atau sedang menunggu persetujuan.',
            onSelect: (item) => {
                if (typeof tambahBarangPengembalian === 'function') {
                    tambahBarangPengembalian(item);
                }
            },
        });
    });
</script>
