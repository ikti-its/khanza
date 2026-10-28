<?= $this->extend('layouts/template'); ?>
<?= $this->section('content'); ?>

<div class="max-w-[85rem] py-6 lg:py-3 mx-auto">
    <div class="flex flex-col">
        <div class="-m-1.5 overflow-y-hidden">
            <div class="px-4 w-full overflow-x-auto">
                <div class="p-5 bg-white border border-gray-200 rounded-xl shadow-sm dark:bg-slate-900 dark:border-gray-700">
                    <?php
                        echo view('components/header/data', [
                            'judul'      => $judul,
                            'modul_path' => $modul_path,
                            'aksi'       => $aksi,
                        ]);
                        echo view('components/header/search_bar', ['search_server' => true, 'search_q' => $search_q ?? '']);
                    ?>

                    <div class="py-2 flex justify-end">
                        <button type="button" id="btnAjukanPengajuan" onclick="ajukanPengajuanCepat()" disabled
                                class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-[#0A2D27] text-[#ACF2E7] hover:bg-[#13594E] disabled:opacity-50 disabled:pointer-events-none transition-all shadow-sm">
                            Ajukan Pengajuan (<span id="countTerpilih">0</span>)
                        </button>
                    </div>

                    <style>
                        .tabel-ringkas td { width: auto !important; text-align: center; }
                        .tabel-ringkas td>div { padding-left: 0.5rem !important; padding-right: 0.5rem !important; }
                        .tabel-ringkas td[data-jenis="nama"] { white-space: normal !important; min-width: 7rem; }
                        .tabel-ringkas tr.stok-kurang span.teks-stok { color: #b91c1c !important; font-weight: 700 !important; }
                    </style>
                    <div class="overflow-x-auto w-full tabel-ringkas" style="max-height: 600px; overflow-y: auto;">
                        <table id="myTable" class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="sticky top-0 z-10 bg-gray-50 dark:bg-slate-800">
                                <tr>
                                    <th scope="col" class="px-6 py-3" style="position: sticky; top: 0; background-color: white; padding: 8px;">
                                        <div class="flex justify-center gap-x-2">
                                            <span class="text-xs tracking-wide text-[#666] dark:text-gray-200">Pilih</span>
                                        </div>
                                    </th>
                                    <?php foreach (['Kode Barang' => 'left', 'Nama Barang' => 'left', 'Satuan' => 'left', 'Jenis' => 'left', 'Stok' => 'right', 'Harga Satuan (Rp)' => 'right'] as $h => $rata): ?>
                                    <th scope="col" class="px-6 py-3" style="position: sticky; top: 0; background-color: white; padding: 8px;">
                                        <div class="flex gap-x-2" style="justify-content: <?= $rata === 'right' ? 'flex-end' : 'flex-start' ?>;">
                                            <span class="text-xs tracking-wide text-[#666] dark:text-gray-200"><?= esc($h) ?></span>
                                        </div>
                                    </th>
                                    <?php endforeach; ?>
                                    <?php if (!empty($aksi)): ?>
                                    <th scope="col" class="px-6 py-3" style="position: sticky; top: 0; background-color: white; padding: 8px;">
                                        <div class="flex justify-center gap-x-2">
                                            <span class="text-xs tracking-wide text-[#666] dark:text-gray-200">Aksi</span>
                                        </div>
                                    </th>
                                    <?php endif; ?>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                <?php foreach ($tabel as $baris): ?>
                                <?php
                                    $stok         = (float) ($baris['stok'] ?? 0);
                                    $stok_minimum = $baris['stok_minimum'] ?? null;
                                    $eligible     = $stok_minimum !== null && $stok < (float) $stok_minimum;
                                    $tr_style     = $eligible
                                        ? 'background-color:#fff7ed; border-left:4px solid #f97316;'
                                        : 'border-left:4px solid transparent;';
                                ?>
                                <tr style="<?= $tr_style ?>"<?= $eligible ? ' class="stok-kurang"' : '' ?>>
                                    <td class="h-px w-16 whitespace-nowrap">
                                        <div class="px-6 py-3 text-center">
                                            <?php if ($eligible): ?>
                                            <input type="checkbox" class="chk-barang" value="<?= (int) $baris['id_barang'] ?>" onchange="updateHitungTerpilih()">
                                            <?php endif; ?>
                                        </div>
                                    </td>
                                    <td class="h-px w-40 whitespace-nowrap">
                                        <div class="px-6 py-3">
                                            <span class="block text-sm font-semibold text-gray-800 dark:text-gray-200" style="text-align: left;"><?= esc($baris['kode_barang'] ?? '-') ?></span>
                                        </div>
                                    </td>
                                    <td data-jenis="nama" class="h-px w-64 whitespace-nowrap">
                                        <div class="px-6 py-3">
                                            <span class="block text-sm font-semibold text-gray-800 dark:text-gray-200" style="text-align: left;"><?= esc($baris['nama_barang'] ?? '-') ?></span>
                                        </div>
                                    </td>
                                    <td class="h-px w-40 whitespace-nowrap">
                                        <div class="px-6 py-3">
                                            <span class="block text-sm font-semibold text-gray-800 dark:text-gray-200" style="text-align: left;"><?= esc($baris['nama_satuan'] ?? '-') ?></span>
                                        </div>
                                    </td>
                                    <td class="h-px w-40 whitespace-nowrap">
                                        <div class="px-6 py-3">
                                            <span class="block text-sm font-semibold text-gray-800 dark:text-gray-200" style="text-align: left;"><?= esc($baris['nama_jenis_barang'] ?? '-') ?></span>
                                        </div>
                                    </td>
                                    <td class="h-px w-28 whitespace-nowrap">
                                        <div class="px-6 py-3">
                                            <span class="teks-stok text-right block text-sm font-semibold text-gray-800 dark:text-gray-200"><?= number_format($stok, 0, ',', '.') ?></span>
                                        </div>
                                    </td>
                                    <td class="h-px w-40 whitespace-nowrap">
                                        <div class="px-6 py-3">
                                            <span class="text-right block text-sm font-semibold text-gray-800 dark:text-gray-200"><?= number_format((float) ($baris['harga_satuan'] ?? 0), 0, ',', '.') ?></span>
                                        </div>
                                    </td>
                                    <?php if (!empty($aksi)): ?>
                                    <?= view('components/aksi/aksi', [
                                        'modul_path' => $modul_path,
                                        'id'         => $baris['id_barang'],
                                        'aksi'       => $aksi,
                                        'baris'      => $baris,
                                        'child_link' => null,
                                    ]) ?>
                                    <?php endif; ?>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="pt-3 text-sm text-gray-600 dark:text-gray-300">
                        Keterangan: angka stok berwarna <b style="color:#b91c1c;">merah</b> menandakan stok barang <b>di bawah stok minimum</b> dan perlu diajukan pengadaan.
                    </div>

                    <?= view('components/footer/footer', ['meta_data' => $meta_data, 'modul_path' => $modul_path]) ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function updateHitungTerpilih() {
        var checked = document.querySelectorAll('.chk-barang:checked');
        document.getElementById('countTerpilih').textContent = checked.length;
        document.getElementById('btnAjukanPengajuan').disabled = checked.length === 0;
    }

    function ajukanPengajuanCepat() {
        var checked = document.querySelectorAll('.chk-barang:checked');
        if (checked.length === 0) return;
        var ids = Array.prototype.map.call(checked, function (c) { return c.value; });
        window.location.href = '<?= site_url('inventori-non-medis/pengajuan-barang/tambah') ?>?prefill_barang=' + ids.join(',');
    }
</script>

<?= $this->endSection(); ?>
