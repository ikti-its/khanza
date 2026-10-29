<?php
/**
 * Filter status (checkbox, ?status[]=) dan periode (?dari=&sampai=, format Y-m-d) di baris yang sama dengan
 * kotak pencarian. Gaya inline karena sebagian kelas utilitas tidak tersedia di style.css hasil build.
 *
 * @var string       $dari
 * @var string       $sampai
 * @var list<string> $status_opsi kelompok status yang tersedia (kosong = filter status tidak tampil)
 * @var list<string> $status      kelompok status yang dicentang
 */
$status_opsi ??= [];
$status      ??= [];
$lain  = array_diff_key(service('request')->getGet() ?? [], ['dari' => null, 'sampai' => null, 'status' => null, 'page' => null]);
$aktif = $dari !== '' || $sampai !== '' || $status !== [];
$ringkas = match (count($status)) {
    0       => 'Semua',
    1       => $status[0],
    default => count($status) . ' dipilih',
};
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
    .filter-status > summary { list-style: none; cursor: pointer; }
    .filter-status > summary::-webkit-details-marker { display: none; }
    .filter-status[open] > summary { border-color: #0A2D27 !important; }
    .filter-status[open] .panah { transform: rotate(180deg); }
    .filter-status label:hover { background: #f3f4f6; }
</style>
<form method="get" action="" class="py-4" style="display:flex; align-items:center; gap:8px; flex-wrap:wrap; margin-left:auto;">
    <?php foreach ($lain as $k => $v): ?>
        <?php if (is_string($v)): ?>
            <input type="hidden" name="<?= esc((string) $k, 'attr') ?>" value="<?= esc($v, 'attr') ?>">
        <?php endif; ?>
    <?php endforeach; ?>

    <?php if ($status_opsi !== []): ?>
        <details class="filter-status" style="position:relative;">
            <summary style="display:flex; align-items:stretch; height:38px; border:1px solid <?= $status !== [] ? '#0A2D27' : '#d1d5db' ?>; border-radius:8px; background:#fff; overflow:hidden;">
                <span style="display:flex; align-items:center; padding:0 12px; background:#f3f4f6; border-right:1px solid #e5e7eb; font-size:13px; font-weight:600; color:#374151;">
                    Status
                </span>
                <span style="display:flex; align-items:center; gap:8px; padding:0 12px; font-size:14px; color:#1f2937; white-space:nowrap;">
                    <?= esc($ringkas) ?>
                    <svg class="panah" style="width:14px; height:14px; color:#6b7280; transition:transform .15s;" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                    </svg>
                </span>
            </summary>
            <div style="position:absolute; top:44px; left:0; z-index:30; min-width:220px; padding:6px; background:#fff; border:1px solid #e5e7eb; border-radius:10px; box-shadow:0 10px 25px -5px rgba(0,0,0,.12);">
                <?php foreach ($status_opsi as $opsi): ?>
                    <label style="display:flex; align-items:center; gap:10px; padding:7px 10px; border-radius:6px; font-size:14px; color:#1f2937; cursor:pointer; white-space:nowrap;">
                        <input type="checkbox" name="status[]" value="<?= esc($opsi, 'attr') ?>" <?= in_array($opsi, $status, true) ? 'checked' : '' ?>
                            style="width:16px; height:16px; accent-color:#0A2D27; cursor:pointer;">
                        <?= esc($opsi) ?>
                    </label>
                <?php endforeach; ?>
                <p style="margin:4px 10px 2px; font-size:12px; color:#9ca3af;">Kosongkan untuk menampilkan semua status.</p>
            </div>
        </details>
    <?php endif; ?>

    <div class="filter-periode"
        style="display:flex; align-items:stretch; height:38px; border:1px solid <?= $dari !== '' || $sampai !== '' ? '#0A2D27' : '#d1d5db' ?>; border-radius:8px; background:#fff; overflow:hidden;">
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
<script>
    // tutup pilihan status saat klik di luar
    document.addEventListener('click', (e) => {
        document.querySelectorAll('details.filter-status[open]').forEach((d) => {
            if (!d.contains(e.target)) d.removeAttribute('open');
        });
    });
</script>
