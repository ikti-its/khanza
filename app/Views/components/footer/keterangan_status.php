<?php
/**
 * Keterangan badge status di bawah tabel daftar.
 *
 * @var list<array{0: string, 1: string}> $keterangan - [label badge, arti]
 */

// warna sama dengan components/tabel/td/status.php
$warna = [
    'pengajuan pembatalan'   => 'background-color:#FED7AA; color:#9A3412;',
    'pengajuan pengembalian' => 'background-color:#E9D5FF; color:#5B21B6;',
];
?>
<div class="pt-3 flex flex-col items-start gap-y-1.5 text-sm text-gray-600 dark:text-gray-300">
    <span>Keterangan:</span>
    <?php foreach ($keterangan as [$label, $arti]): ?>
        <span class="inline-flex items-center gap-2">
            <span class="inline-flex items-center py-1 px-3 rounded-full text-xs font-semibold"
                style="<?= $warna[strtolower($label)] ?? 'background-color:#F1F1F1; color:#374151;' ?>"><?= esc($label) ?></span>
            <span><?= esc($arti) ?></span>
        </span>
    <?php endforeach; ?>
</div>
