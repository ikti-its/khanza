<?= $this->extend('layouts/template'); ?>
<?= $this->section('content'); ?>
<?= $this->include('admin/inventorinonmedis/_gaya_tabel') ?>

<div class="max-w-[85rem] py-6 lg:py-3 px-8 mx-auto">
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-4 sm:p-7 dark:bg-slate-900 dark:border-gray-800">

        <?= view('components/form/judul', ['judul' => $judul]) ?>

        <div class="space-y-1">

            <!-- Tipe Transaksi + Tanggal -->
            <div class="sm:block md:flex items-center py-3">
                <span class="block mb-1 md:mb-0 text-sm font-medium text-gray-500 dark:text-gray-500 md:w-1/4 flex-shrink-0">Tipe Transaksi</span>
                <div class="w-full lg:w-1/4">
                    <?php
                    $tipe = strtolower(trim($baris['nama_tipe_transaksi_stok'] ?? '-'));
                    $tipe_bg = '#F3F4F6'; $tipe_color = '#374151';
                    if ($tipe === 'masuk') { $tipe_bg = '#DBEAFE'; $tipe_color = '#1E40AF'; }
                    elseif ($tipe === 'keluar') { $tipe_bg = '#FED7AA'; $tipe_color = '#9A3412'; }
                    elseif ($tipe === 'opname') { $tipe_bg = '#E9D5FF'; $tipe_color = '#5B21B6'; }
                    elseif ($tipe === 'pengembalian') { $tipe_bg = '#CCFBF1'; $tipe_color = '#115E59'; }
                    ?>
                    <span class="inline-flex items-center py-1 px-2.5 rounded-full text-xs font-semibold" style="background-color: <?= $tipe_bg ?>; color: <?= $tipe_color ?>;">
                        <?= esc($baris['nama_tipe_transaksi_stok'] ?? '-') ?>
                    </span>
                </div>
                <span class="block mt-4 md:my-0 md:ml-10 mb-1 text-sm font-medium text-gray-500 dark:text-gray-500 md:w-1/4">Tanggal</span>
                <div class="w-full lg:w-1/4">
                    <span class="text-sm font-semibold text-gray-900 dark:text-white"><?= !empty($baris['tanggal']) ? date('d/m/Y, H:i', strtotime($baris['tanggal'])) : '-' ?></span>
                </div>
            </div>

            <!-- No. Masuk / No. Keluar -->
            <div class="sm:block md:flex items-center py-3">
                <span class="block mb-1 md:mb-0 text-sm font-medium text-gray-500 dark:text-gray-500 md:w-1/4 flex-shrink-0">No. Referensi</span>
                <div class="w-full lg:w-1/4">
                    <span class="text-sm font-semibold text-gray-900 dark:text-white">
                        <?php
                        $no_ref = $baris['no_masuk'] ?? $baris['no_keluar'] ?? $baris['no_pengembalian'] ?? '-';
                        echo esc($no_ref);
                        ?>
                    </span>
                </div>
                <span class="block mt-4 md:my-0 md:ml-10 mb-1 text-sm font-medium text-gray-500 dark:text-gray-500 md:w-1/4">Keterangan</span>
                <div class="w-full lg:w-1/4">
                    <span class="text-sm font-semibold text-gray-900 dark:text-white"><?= esc($baris['keterangan'] ?? '-') ?></span>
                </div>
            </div>

        </div>

        <?php if (!empty($alur['dokumen'])): ?>
            <!-- Dokumen terkait: tombol garis membuka dokumen, tombol gelap membuka alur lengkap di Monitoring -->
            <div class="sm:block md:flex items-start py-3">
                <span class="block mb-2 md:mb-0 text-sm font-medium text-gray-500 dark:text-gray-500 md:w-1/4 flex-shrink-0">Dokumen Terkait</span>
                <div style="display:flex; flex-wrap:wrap; gap:8px;">
                    <?php foreach ($alur['dokumen'] as [$label, $link]): ?>
                        <a href="<?= base_url($link) ?>" style="padding:6px 12px;"
                            class="inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800">
                            <svg style="width:14px; height:14px;" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                            </svg>
                            <?= esc($label) ?>
                        </a>
                    <?php endforeach; ?>
                    <?php if (!empty($alur['monitoring'])): ?>
                        <a href="<?= base_url($alur['monitoring']) ?>" style="padding:6px 12px;"
                            class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent shadow-sm bg-[#0A2D27] text-[#ACF2E7] hover:bg-[#13594E]">
                            <svg style="width:14px; height:14px;" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                            </svg>
                            Lihat Alur di Monitoring
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>

        <?php if (!empty($alur['tracking']['steps'])): ?>
            <!-- Lini masa dokumen asal -->
            <?= $alur['jenis'] === 'permintaan'
                ? view('admin/inventorinonmedis/_timeline_permintaan', ['tracking' => $alur['tracking']])
                : view('admin/inventorinonmedis/_timeline_pengajuan', ['tracking' => $alur['tracking']]) ?>
        <?php endif; ?>

        <!-- Detail Items -->
        <div class="mt-6 bg-slate-50 border border-slate-200 rounded-xl p-5 dark:bg-slate-800 dark:border-slate-700 shadow-sm">
            <div class="flex items-center gap-x-2 mb-3 border-b border-slate-200 pb-2 dark:border-slate-700">
                <svg class="w-4 h-4 text-teal-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z"/>
                </svg>
                <h4 class="text-xs font-bold text-slate-500 uppercase tracking-wider dark:text-slate-400">Detail Barang</h4>
            </div>

            <?php if (!empty($detail_items)): ?>
            <table class="w-full text-sm">
                <thead>
                    <tr class="text-slate-500 dark:text-slate-400">
                        <th class="text-left py-2 font-medium">Kode</th>
                        <th class="text-left py-2 font-medium">Nama Barang</th>
                        <th class="text-left py-2 font-medium">Satuan</th>
                        <th class="text-right py-2 font-medium">Qty</th>
                        <th class="text-right py-2 font-medium">Harga Satuan (Rp)</th>
                        <th class="text-right py-2 font-medium">Stok Sebelum</th>
                        <th class="text-right py-2 font-medium">Stok Sesudah</th>
                    </tr>
                </thead>
                <tbody class="text-slate-700 dark:text-slate-300">
                    <?php foreach ($detail_items as $item): ?>
                    <tr class="border-t border-slate-100 dark:border-slate-700/50">
                        <td class="text-left py-2 font-mono text-sm"><?= esc($item['kode_barang'] ?? '-') ?></td>
                        <td class="text-left py-2 font-semibold"><?= esc($item['nama_barang'] ?? '-') ?></td>
                        <td class="text-left py-2"><?= esc($item['nama_satuan'] ?? '-') ?></td>
                        <td class="text-right py-2 font-semibold"><?= $item['qty'] ?? 0 ?></td>
                        <td class="text-right py-2"><?= number_format((float)($item['harga_satuan'] ?? 0), 0, ',', '.') ?></td>
                        <td class="text-right py-2"><?= $item['stok_sebelum'] ?? 0 ?></td>
                        <td class="text-right py-2 font-semibold"><?= $item['stok_sesudah'] ?? 0 ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php else: ?>
            <p class="text-sm text-slate-400 italic text-center py-4">Tidak ada detail barang.</p>
            <?php endif; ?>
        </div>

        <!-- Tombol Kembali -->
        <div class="mt-5 pt-5 border-t border-gray-200 dark:border-gray-800 flex justify-end">
            <a href="javascript:history.back()" class="py-2 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800">
                Kembali
            </a>
        </div>

    </div>
</div>

<?= $this->endSection(); ?>
