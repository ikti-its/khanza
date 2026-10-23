<?php
// Tombol "Kembali ke Monitoring" di bawah breadcrumb. Alamat monitoring disimpan saat
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
            // diletakkan tepat di bawah breadcrumb, di atas kartu konten
            var breadcrumb = document.querySelector('nav[aria-label="breadcrumb"]');
            var baris = breadcrumb ? breadcrumb.parentElement : null;
            if (!baris) return;

            var wadah = document.createElement('div');
            wadah.style.cssText = 'padding:0 40px 8px; display:flex; align-items:center; gap:6px;';

            var tombol = document.createElement('a');
            tombol.href = simpan.url;
            tombol.style.cssText = 'display:inline-flex; align-items:center; gap:6px; padding:4px 10px; font-size:13px; font-weight:500; color:#374151; background:#fff; border:1px solid #e5e7eb; border-radius:8px; text-decoration:none;';
            tombol.innerHTML = '<svg style="width:14px; height:14px;" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" /></svg>';
            tombol.appendChild(document.createTextNode('Kembali ke Monitoring' + (simpan.label ? ' (' + simpan.label + ')' : '')));
            tombol.addEventListener('mouseenter', function() { tombol.style.background = '#f9fafb'; });
            tombol.addEventListener('mouseleave', function() { tombol.style.background = '#fff'; });

            var tutup = document.createElement('button');
            tutup.type = 'button';
            tutup.title = 'Sembunyikan';
            tutup.textContent = '×';
            tutup.style.cssText = 'padding:2px 6px; font-size:16px; line-height:1; color:#9ca3af; background:transparent; border:0; cursor:pointer;';
            tutup.addEventListener('click', function() {
                try {
                    sessionStorage.removeItem(KUNCI);
                } catch (err) {}
                wadah.remove();
            });

            wadah.appendChild(tombol);
            wadah.appendChild(tutup);
            baris.insertAdjacentElement('afterend', wadah);
        });
    })();
</script>
