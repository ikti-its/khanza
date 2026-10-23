<?php
// Tombol mengambang "Kembali ke Monitoring". Alamat monitoring disimpan saat
// pengguna mengklik tombol di detail Monitoring Transaksi (lihat data-monitoring
// di detail_monitoring_transaksi.php), jadi tetap ada walau form sudah disimpan
// dan halaman dialihkan ke daftar. Hanya dimuat di halaman /inventori-non-medis/.
$di_monitoring = str_starts_with(uri_string(), 'inventori-non-medis/monitoring-transaksi');
?>
<script>
    (function() {
        var KUNCI = 'monitoring_kembali';
        var simpan = null;
        try {
            <?php if ($di_monitoring): ?>
            // sudah kembali ke monitoring, pengingat tidak diperlukan lagi
            sessionStorage.removeItem(KUNCI);
            <?php else: ?>
            simpan = JSON.parse(sessionStorage.getItem(KUNCI) || 'null');
            <?php endif; ?>
        } catch (e) {
            simpan = null;
        }

        // klik tombol di detail monitoring: ingat halaman monitoring ini
        document.addEventListener('click', function(e) {
            var a = e.target.closest('a[data-monitoring]');
            if (!a) return;
            try {
                sessionStorage.setItem(KUNCI, JSON.stringify({
                    url: location.pathname + location.search,
                    label: a.getAttribute('data-monitoring')
                }));
            } catch (err) {}
        });

        if (!simpan || typeof simpan.url !== 'string' || simpan.url.indexOf('/inventori-non-medis/monitoring-transaksi/') !== 0) return;

        document.addEventListener('DOMContentLoaded', function() {
            var wadah = document.createElement('div');
            wadah.style.cssText = 'position:fixed; right:24px; bottom:24px; z-index:60; display:flex; align-items:center; border-radius:9999px; box-shadow:0 4px 12px rgba(0,0,0,0.2); background:#0A2D27; overflow:hidden;';

            var tombol = document.createElement('a');
            tombol.href = simpan.url;
            tombol.style.cssText = 'display:inline-flex; align-items:center; gap:8px; padding:10px 8px 10px 16px; font-size:14px; font-weight:600; color:#ACF2E7; text-decoration:none;';
            tombol.innerHTML = '<svg style="width:16px; height:16px;" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" /></svg>';
            tombol.appendChild(document.createTextNode('Kembali ke Monitoring' + (simpan.label ? ' (' + simpan.label + ')' : '')));

            var tutup = document.createElement('button');
            tutup.type = 'button';
            tutup.title = 'Tutup';
            tutup.textContent = '×';
            tutup.style.cssText = 'padding:8px 14px 8px 8px; font-size:18px; line-height:1; color:#ACF2E7; background:transparent; border:0; cursor:pointer;';
            tutup.addEventListener('click', function() {
                try {
                    sessionStorage.removeItem(KUNCI);
                } catch (err) {}
                wadah.remove();
                document.body.style.paddingBottom = '';
            });

            wadah.appendChild(tombol);
            wadah.appendChild(tutup);
            document.body.appendChild(wadah);
            // beri ruang supaya tombol Simpan di bawah form tidak tertutup
            document.body.style.paddingBottom = '80px';
        });
    })();
</script>
