<?php
/**
 * Filter periode (?dari=&sampai=, format Y-m-d) di baris yang sama dengan kotak pencarian.
 * Gaya inline karena sebagian kelas utilitas tidak tersedia di style.css hasil build.
 *
 * @var string $dari
 * @var string $sampai
 */
$lain  = array_diff_key(service('request')->getGet() ?? [], ['dari' => null, 'sampai' => null, 'page' => null]);
$aktif = $dari !== '' || $sampai !== '';
?>
<style>
    .filter-periode input[type="date"] {
        border: 0; outline: none; background: transparent; padding: 0;
        width: calc(11ch + 24px); /* teks dd/mm/yyyy + ikon kalender, ikut lebar karakter font aktif */
        font-size: 14px; color: #1f2937; font-variant-numeric: tabular-nums;
    }
    .filter-periode input[type="date"]::-webkit-calendar-picker-indicator {
        margin-left: 6px; cursor: pointer; opacity: 0.55;
    }
    .filter-periode input[type="date"]::-webkit-calendar-picker-indicator:hover { opacity: 1; }
    .filter-periode:focus-within { border-color: #0A2D27 !important; }
</style>
<form method="get" action="" class="py-4" style="display:flex; align-items:center; gap:8px; flex-wrap:wrap;">
    <?php foreach ($lain as $k => $v): ?>
        <?php if (is_string($v)): ?>
            <input type="hidden" name="<?= esc((string) $k, 'attr') ?>" value="<?= esc($v, 'attr') ?>">
        <?php endif; ?>
    <?php endforeach; ?>

    <div class="filter-periode"
        style="display:flex; align-items:stretch; height:38px; border:1px solid <?= $aktif ? '#0A2D27' : '#d1d5db' ?>; border-radius:8px; background:#fff; overflow:hidden;">
        <span style="display:flex; align-items:center; padding:0 12px; background:#f3f4f6; border-right:1px solid #e5e7eb; font-size:13px; font-weight:600; color:#374151;">
            Periode
        </span>
        <div style="display:flex; align-items:center; gap:10px; padding:0 12px;">
            <input type="date" name="dari" value="<?= esc($dari, 'attr') ?>" aria-label="Dari tanggal">
            <span style="color:#9ca3af; font-size:13px;">s.d.</span>
            <input type="date" name="sampai" value="<?= esc($sampai, 'attr') ?>" aria-label="Sampai tanggal">
        </div>
    </div>

    <button type="submit" class="bg-[#0A2D27] text-[#ACF2E7] hover:bg-[#13594E]"
        style="height:38px; padding:0 16px; border-radius:8px; font-size:14px; font-weight:600;">
        Terapkan
    </button>
    <?php if ($aktif): ?>
        <a href="?<?= esc(http_build_query($lain), 'attr') ?>" style="font-size:14px; color:#6b7280; text-decoration:underline; text-underline-offset:2px;">Reset</a>
    <?php endif; ?>
</form>
