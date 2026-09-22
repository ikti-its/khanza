<?php
declare(strict_types=1);

/**
 * Tracking Helper — Progress tracking end-to-end untuk Permintaan Barang.
 *
 * Timeline Permintaan (5 langkah, tiap langkah punya sub-baris):
 *   Alur pengadaan   : Permintaan → Pengajuan → Pengadaan → Penerimaan → Selesai
 *   Alur stok langsung: Permintaan → Selesai (Pengajuan/Pengadaan/Penerimaan dilewati)
 *
 * Struktur `steps` yang dikembalikan get_permintaan_tracking() DIRENDER oleh
 * app/Views/admin/inventorinonmedis/_timeline_permintaan.php, dan get_pengajuan_tracking()
 * (pengajuan MANDIRI, 4 langkah) oleh _timeline_pengajuan.php — keduanya partial
 * modul ini sendiri, BUKAN partial shared components/tracking/timeline.php.
 * Itu tetap dipakai get_penerimaan_tracking() saja, dengan struktur lama `_s()`.
 */

if (!function_exists('pg_bool_is_true')) {
    /**
     * Baca kolom boolean Postgres yang bisa balik sebagai native bool ATAU
     * string 't'/'f' tergantung driver — `!empty()`/`(bool)` cast SALAH untuk
     * string 'f' (non-kosong, jadi dianggap truthy oleh keduanya). Pola sama
     * seperti allow_partial_shipment() di kedua controller Persetujuan/
     * Permintaan, disatukan di sini supaya dipakai konsisten oleh pembaca flag
     * pengajuan_pembatalan di kedua view dan controller (BUKAN oleh helper ini
     * sendiri — _determine_progress() sengaja tidak lagi memeriksa flag ini
     * sama sekali, lihat keputusan final di komentar get_permintaan_tracking()).
     */
    function pg_bool_is_true(mixed $value): bool
    {
        return in_array(strtolower((string) ($value ?? 'f')), ['1', 't', 'true', 'y', 'yes'], true);
    }
}

if (!function_exists('_trow')) {
    /** Satu sub-baris di dalam sebuah langkah timeline: text + tanggal opsional + tone. */
    function _trow(string $text, ?string $date = null, ?string $tone = null): array
    {
        return compact('text', 'date', 'tone');
    }
}

if (!function_exists('_tstep')) {
    /** Satu langkah timeline: status utama (warna dot) + daftar sub-baris (_trow). */
    function _tstep(string $label, string $status, array $rows, ?string $link = null): array
    {
        return compact('label', 'status', 'rows', 'link');
    }
}

if (!function_exists('get_permintaan_tracking')) {
    /**
     * Keputusan final (setelah beberapa iterasi Gelombang 3): progress_label/
     * progress_color di sini SENGAJA TIDAK PERNAH dipengaruhi flag
     * pengajuan_pembatalan — badge Status utama harus selalu murni
     * mencerminkan id_status_permintaan_barang yang sebenarnya (4/5/6/7/8),
     * tanpa pengecualian. Info pengajuan pembatalan HANYA muncul lewat panel
     * terpisah di kedua view detail (dibaca langsung dari $baris via
     * pg_bool_is_true(), bukan dari struktur ini).
     *
     * @return array{
     *   scenario: 'direct'|'procurement',
     *   steps: list<array<array-key, mixed>>,
     *   progress_label: string,
     *   progress_color: string,
     * }
     */
    function get_permintaan_tracking(int $id_permintaan): array
    {
        $config             = (new \Config\Database())->default;
        $config['database'] = env('database.default.khanza_db');
        $db                 = \Config\Database::connect($config);

        // === Data Permintaan ===
        $permintaan = $db->table('inventori_non_medis.permintaan_barang pb')
            ->join('role.petugas pt', 'pb.petugas = pt.id_petugas', 'left')
            ->join('person.orang o', 'pt.id_orang = o.id_orang', 'left')
            ->join('role.petugas pg', 'pb.petugas_gudang = pg.id_petugas', 'left')
            ->join('person.orang og', 'pg.id_orang = og.id_orang', 'left')
            ->join('role.petugas ppn', 'pb.petugas_penerima = ppn.id_petugas', 'left')
            ->join('person.orang opn', 'ppn.id_orang = opn.id_orang', 'left')
            ->select('pb.*, o.nama AS nama_pemohon, og.nama AS nama_pengelola, opn.nama AS nama_penerima')
            ->where('pb.id_permintaan', $id_permintaan)
            ->get()->getRowArray();

        if (empty($permintaan)) {
            return ['scenario' => 'direct', 'steps' => [], 'progress_label' => '-', 'progress_color' => 'gray'];
        }
        assert(is_array($permintaan), 'Baris permintaan harus array.');

        $st = (int) ($permintaan['id_status_permintaan_barang'] ?? 0);

        // === Cari Pengajuan linked ===
        $pengajuan = $db->table('inventori_non_medis.pengajuan_barang pj')
            ->join('role.petugas pt', 'pj.atasan_logistik = pt.id_petugas', 'left')
            ->join('person.orang o', 'pt.id_orang = o.id_orang', 'left')
            ->select('pj.id_pengajuan, pj.no_pengajuan, pj.tanggal, pj.id_status_pengajuan_barang, pj.tanggal_diproses, o.nama AS nama_atasan')
            ->where('pj.id_permintaan', $id_permintaan)
            ->orderBy('pj.id_pengajuan', 'DESC')
            ->limit(1)
            ->get()->getRowArray();
        assert($pengajuan === null || is_array($pengajuan), 'Baris pengajuan harus array atau null.');

        // === Cari Pengadaan dari Pengajuan ===
        $pengadaan = null;
        if (!empty($pengajuan)) {
            $pengadaan = $db->table('inventori_non_medis.pengadaan_barang pd')
                ->join('inventori_non_medis.suplier s', 'pd.id_suplier = s.id_suplier', 'left')
                ->select('pd.id_pengadaan, pd.no_pengadaan, pd.tanggal, pd.id_status_pengadaan_barang, s.nama_suplier')
                ->where('pd.id_pengajuan', (int) $pengajuan['id_pengajuan'])
                ->orderBy('pd.id_pengadaan', 'DESC')
                ->limit(1)
                ->get()->getRowArray();
        }
        assert($pengadaan === null || is_array($pengadaan), 'Baris pengadaan harus array atau null.');

        // === Cari Penerimaan dari Pengadaan ===
        $penerimaan = null;
        $persen_terima = 0;
        if (!empty($pengadaan)) {
            $penerimaan = $db->table('inventori_non_medis.penerimaan_barang')
                ->select('id_penerimaan, no_penerimaan, tanggal, id_status_penerimaan_barang')
                ->where('id_pengadaan', (int) $pengadaan['id_pengadaan'])
                ->where('id_status_penerimaan_barang', 2)
                ->orderBy('id_penerimaan', 'DESC')
                ->limit(1)
                ->get()->getRowArray();

            // Jika belum ada yang Diterima, ambil yang terbaru
            if (empty($penerimaan)) {
                $penerimaan = $db->table('inventori_non_medis.penerimaan_barang')
                    ->select('id_penerimaan, no_penerimaan, tanggal, id_status_penerimaan_barang')
                    ->where('id_pengadaan', (int) $pengadaan['id_pengadaan'])
                    ->orderBy('id_penerimaan', 'DESC')
                    ->limit(1)
                    ->get()->getRowArray();
            }

            // Hitung % penerimaan
            $total_pesan = (int) ($db->table('inventori_non_medis.pengadaan_barang_detail')
                ->selectSum('qty', 'total')
                ->where('id_pengadaan', (int) $pengadaan['id_pengadaan'])
                ->where('id_barang >', 0)
                ->get()->getRowArray()['total'] ?? 0);

            $total_terima = (int) ($db->query("
                SELECT COALESCE(SUM(d.qty_diterima), 0) AS total
                FROM inventori_non_medis.penerimaan_barang_detail d
                JOIN inventori_non_medis.penerimaan_barang p ON d.id_penerimaan = p.id_penerimaan
                WHERE p.id_pengadaan = ? AND p.id_status_penerimaan_barang = 2
            ", [(int) $pengadaan['id_pengadaan']])->getRowArray()['total'] ?? 0);

            $persen_terima = $total_pesan > 0 ? min(100, (int) round(($total_terima / $total_pesan) * 100)) : 0;
        }
        assert($penerimaan === null || is_array($penerimaan), 'Baris penerimaan harus array atau null.');

        // === Tentukan Skenario ===
        // Jalur pengadaan bila permintaan ini memicu pengajuan; selain itu jalur
        // stok langsung → langkah Pengajuan/Pengadaan/Penerimaan dilewati total.
        $is_procurement = !empty($pengajuan);
        $scenario = $is_procurement ? 'procurement' : 'direct';

        // === Build Steps ===
        $steps = [_step_permintaan($permintaan, $st)];

        if ($scenario === 'procurement') {
            $steps[] = _step_pengajuan_row($pengajuan);
            $steps[] = _step_pengadaan_row($pengadaan, $pengajuan);
            $steps[] = _step_penerimaan_row($penerimaan, $persen_terima, $pengadaan, $st);
        }

        $steps[] = _step_selesai($permintaan, $st);

        // Permintaan dibatalkan (7): langkah hilir yang masih "sedang berjalan"
        // diredupkan jadi netral; fakta (label/tanggal) tetap apa adanya.
        if ($st === 7) {
            for ($k = 1; $k < count($steps); $k++) {
                if (($steps[$k]['status'] ?? '') === 'active') {
                    $steps[$k]['status'] = 'waiting';
                }
            }
        }

        // === Progress label & color ===
        [$progress_label, $progress_color] = _determine_progress($st, $scenario, $pengajuan, $pengadaan, $penerimaan, $persen_terima);

        return compact('scenario', 'steps', 'progress_label', 'progress_color');
    }
}

if (!function_exists('get_permintaan_pembatalan_cascade_reason')) {
    /**
     * Identifikasi PENYEBAB penutupan otomatis suatu permintaan (status 7)
     * yang terjadi TANPA melalui keputusan_pembatalan() — dipicu cascade
     * PersetujuanPengajuanBarangController::close_stuck_permintaan_on_reject()
     * (pengajuan ditolak atasan) atau
     * PengadaanBarangController::close_stuck_permintaan_on_cancel() (pengadaan
     * dibatalkan). Kedua cascade itu menutup permintaan TANPA mengisi
     * petugas_gudang_pembatalan, jadi penyebabnya tidak terekam langsung di
     * baris permintaan_barang — dua query ringan (bukan join berat, mengikuti
     * pola pencarian pengajuan/pengadaan "terbaru" yang sama seperti
     * get_permintaan_tracking() di atas) sudah cukup untuk membedakannya.
     *
     * @return 'pengajuan_ditolak'|'pengadaan_dibatalkan'|null null bila tidak
     *         ada pengajuan/pengadaan terkait, atau tak satu pun berstatus
     *         ditolak/dibatalkan (penyebab tak dapat ditentukan).
     * @throws \CodeIgniter\Database\Exceptions\DatabaseException
     */
    function get_permintaan_pembatalan_cascade_reason(int $id_permintaan): ?string
    {
        $config             = (new \Config\Database())->default;
        $config['database'] = env('database.default.khanza_db');
        $db                 = \Config\Database::connect($config);

        $pengajuan = $db->table('inventori_non_medis.pengajuan_barang')
            ->select('id_pengajuan, id_status_pengajuan_barang')
            ->where('id_permintaan', $id_permintaan)
            ->orderBy('id_pengajuan', 'DESC')
            ->limit(1)
            ->get()->getRowArray();

        if (empty($pengajuan)) {
            return null;
        }
        assert(is_array($pengajuan), 'Baris pengajuan harus array.');

        if ((int) ($pengajuan['id_status_pengajuan_barang'] ?? 0) === 3) {
            return 'pengajuan_ditolak';
        }

        $pengadaan = $db->table('inventori_non_medis.pengadaan_barang')
            ->select('id_status_pengadaan_barang')
            ->where('id_pengajuan', (int) $pengajuan['id_pengajuan'])
            ->orderBy('id_pengadaan', 'DESC')
            ->limit(1)
            ->get()->getRowArray();

        if (!empty($pengadaan) && (int) ($pengadaan['id_status_pengadaan_barang'] ?? 0) === 3) {
            return 'pengadaan_dibatalkan';
        }

        return null;
    }
}

// =====================================================================
// LANGKAH TIMELINE PERMINTAAN (struktur baru: status utama + sub-baris)
// =====================================================================

if (!function_exists('_step_permintaan')) {
    // Lebur langkah Permintaan + Persetujuan lama. Dua sub-baris:
    // "Diajukan oleh {pemohon}" dan keputusan pengelola (setuju/tolak/batal).
    function _step_permintaan(array $p, int $st): array
    {
        $tgl        = isset($p['tanggal']) ? (string) $p['tanggal'] : null;
        $tgl_proses = isset($p['tanggal_diproses']) ? (string) $p['tanggal_diproses'] : null;
        $pemohon    = isset($p['nama_pemohon']) ? (string) $p['nama_pemohon'] : '-';
        $pengelola  = isset($p['nama_pengelola']) ? (string) $p['nama_pengelola'] : '-';

        if ($st === 1) {
            return _tstep('Permintaan', 'active', [_trow("Draf oleh {$pemohon}", $tgl, 'active')]);
        }

        $rows = [_trow("Diajukan oleh {$pemohon}", $tgl, 'done')];

        if ($st === 4) {
            $rows[] = _trow('Menunggu persetujuan pengelola', null, 'active');
            return _tstep('Permintaan', 'active', $rows);
        }
        if ($st === 3) {
            $rows[] = _trow("Ditolak oleh {$pengelola}", $tgl_proses, 'failed');
            return _tstep('Permintaan', 'failed', $rows);
        }
        if ($st === 7) {
            $rows[] = _trow('Dibatalkan', $tgl_proses, 'failed');
            return _tstep('Permintaan', 'failed', $rows);
        }

        // 2, 5, 6, 8 — sudah disetujui pengelola
        $rows[] = _trow("Disetujui oleh {$pengelola}", $tgl_proses, 'done');
        return _tstep('Permintaan', 'done', $rows);
    }
}

if (!function_exists('_step_pengajuan_row')) {
    // Satu status utama + satu baris info. Hanya dirender pada jalur pengadaan.
    function _step_pengajuan_row(?array $pj): array
    {
        if (empty($pj)) {
            return _tstep('Pengajuan', 'waiting', [_trow('Menunggu pengajuan', null, null)]);
        }

        $link   = '/inventori-non-medis/pengajuan-barang/' . (int) ($pj['id_pengajuan'] ?? 0);
        $tgl    = isset($pj['tanggal']) ? (string) $pj['tanggal'] : null;
        $tglp   = isset($pj['tanggal_diproses']) ? (string) $pj['tanggal_diproses'] : $tgl;
        $atasan = isset($pj['nama_atasan']) ? (string) $pj['nama_atasan'] : '-';
        $s_pj   = (int) ($pj['id_status_pengajuan_barang'] ?? 0);

        if ($s_pj === 2) {
            return _tstep('Pengajuan', 'done', [_trow("Disetujui atasan {$atasan}", $tglp, 'done')], $link);
        }
        if ($s_pj === 3) {
            return _tstep('Pengajuan', 'failed', [_trow("Ditolak atasan {$atasan}", $tglp, 'failed')], $link);
        }
        if ($s_pj === 4) {
            // Diselaraskan dengan progress_label "Proses Pengajuan" (lihat
            // _determine_progress()) untuk kondisi yang sama — bukan lagi
            // "Menunggu persetujuan atasan" yang berbeda kosakata.
            return _tstep('Pengajuan', 'active', [_trow('Pengajuan diproses, menunggu atasan', $tgl, 'active')], $link);
        }
        return _tstep('Pengajuan', 'active', [_trow('Draf pengajuan', $tgl, 'active')], $link);
    }
}

if (!function_exists('_step_pengadaan_row')) {
    function _step_pengadaan_row(?array $pd, ?array $pj): array
    {
        if (empty($pd)) {
            $pj_done = !empty($pj) && (int) ($pj['id_status_pengajuan_barang'] ?? 0) === 2;
            // Cabang "belum" diselaraskan dengan progress_label "Proses Pengajuan"
            // untuk kondisi yang sama — bukan lagi "Menunggu persetujuan pengajuan".
            return $pj_done
                ? _tstep('Pengadaan', 'active', [_trow('Menunggu pembuatan PO', null, 'active')])
                : _tstep('Pengadaan', 'waiting', [_trow('Pengajuan masih diproses', null, null)]);
        }

        $link = '/inventori-non-medis/pengadaan-barang/' . (int) ($pd['id_pengadaan'] ?? 0);
        $tgl  = isset($pd['tanggal']) ? (string) $pd['tanggal'] : null;
        $sup  = isset($pd['nama_suplier']) ? (string) $pd['nama_suplier'] : '-';
        $s_pd = (int) ($pd['id_status_pengadaan_barang'] ?? 0);

        if ($s_pd === 2) {
            return _tstep('Pengadaan', 'done', [_trow("Dipesan ke {$sup}", $tgl, 'done')], $link);
        }
        if ($s_pd === 3) {
            return _tstep('Pengadaan', 'failed', [_trow('Dibatalkan', $tgl, 'failed')], $link);
        }
        return _tstep('Pengadaan', 'active', [_trow("Pembelian diproses ke {$sup}", $tgl, 'active')], $link);
    }
}

if (!function_exists('_step_penerimaan_row')) {
    function _step_penerimaan_row(?array $pn, int $persen, ?array $pd, int $st): array
    {
        if (empty($pn)) {
            $pd_active = !empty($pd) && in_array((int) ($pd['id_status_pengadaan_barang'] ?? 0), [1, 2], true);
            return $pd_active
                ? _tstep('Penerimaan', 'active', [_trow('Menunggu kiriman dari suplier', null, 'active')])
                : _tstep('Penerimaan', 'waiting', [_trow('Menunggu pengadaan', null, null)]);
        }

        $link = '/inventori-non-medis/penerimaan-barang/' . (int) ($pn['id_penerimaan'] ?? 0);
        $tgl  = isset($pn['tanggal']) ? (string) $pn['tanggal'] : null;
        $s_pn = (int) ($pn['id_status_penerimaan_barang'] ?? 0);

        if ($s_pn === 2) {
            if ($persen >= 100 || $st === 6) {
                return _tstep('Penerimaan', 'done', [_trow('Diterima lengkap dari suplier', $tgl, 'done')], $link);
            }
            return _tstep('Penerimaan', 'active', [_trow("Diterima {$persen}% dari suplier", $tgl, 'active')], $link);
        }
        if ($s_pn === 3) {
            return _tstep('Penerimaan', 'failed', [_trow('Penerimaan ditolak', $tgl, 'failed')], $link);
        }
        return _tstep('Penerimaan', 'active', [_trow('Barang sedang diperiksa', $tgl, 'active')], $link);
    }
}

if (!function_exists('_step_selesai')) {
    // Lebur langkah Pengeluaran + Diterima lama. Dua sub-baris:
    // "Stok Keluar" dan konfirmasi terima peminta. (No. Keluar sudah tampil
    // sebagai field terpisah di atas halaman detail — tidak diulang di sini.)
    function _step_selesai(array $p, int $st): array
    {
        $tgl_proses = isset($p['tanggal_diproses']) ? (string) $p['tanggal_diproses'] : null;
        $tgl_terima = isset($p['tanggal_diterima']) ? (string) $p['tanggal_diterima'] : null;
        $penerima   = isset($p['nama_penerima']) ? (string) $p['nama_penerima'] : '-';
        $keluar_txt = 'Stok Keluar';

        if ($st === 6) {
            return _tstep('Selesai', 'done', [
                _trow($keluar_txt, $tgl_proses, 'done'),
                _trow("Diterima oleh {$penerima}", $tgl_terima, 'done'),
            ]);
        }
        if ($st === 8) {
            return _tstep('Selesai', 'active', [
                _trow($keluar_txt, $tgl_proses, 'done'),
                _trow('Menunggu konfirmasi terima dari peminta', null, 'active'),
            ]);
        }
        if ($st === 2) {
            return _tstep('Selesai', 'done', [_trow($keluar_txt, $tgl_proses, 'done')]);
        }
        if ($st === 3) {
            return _tstep('Selesai', 'failed', [_trow('Permintaan ditolak', $tgl_proses, 'failed')]);
        }
        if ($st === 7) {
            return _tstep('Selesai', 'failed', [_trow('Permintaan dibatalkan', $tgl_proses, 'failed')]);
        }
        return _tstep('Selesai', 'waiting', [_trow('Menunggu barang dikirim', null, null)]);
    }
}

// ===========================
// HELPERS
// ===========================

if (!function_exists('_s')) {
    function _s(string $label, string $status, string $status_label, ?string $date, ?string $pic, ?string $link = null): array
    {
        return compact('label', 'status', 'status_label', 'date', 'pic', 'link');
    }
}

if (!function_exists('_status_component_color')) {
    /**
     * Tiruan PERSIS dari logika pencocokan warna di
     * components/tabel/td/status.php (tidak diimpor, disalin manual supaya
     * daftar dan detail memakai aturan yang identik tanpa menyentuh file itu).
     * Urutan cabang, daftar in_array, dan kondisi str_starts_with/str_contains
     * HARUS tetap sama persis dengan sumbernya — bila status.php berubah,
     * fungsi ini harus disinkronkan manual lagi.
     *
     * Mengembalikan NAMA warna dari palet get_progress_badge_html()
     * ('green'|'red'|'yellow'|'blue'|'gray'), bukan hex. status.php punya dua
     * warna (oranye utk 'keluar', ungu utk 'opname') yang tidak punya padanan
     * nama di get_progress_badge_html — kedua cabang itu tetap disalin demi
     * kesetiaan urutan, tapi didekati ke 'yellow'/'gray' terdekat; tak pernah
     * tercapai oleh label modul Permintaan Barang.
     */
    function _status_component_color(string $label): string
    {
        $status_lower = strtolower(trim($label));

        if (in_array($status_lower, ['proses permintaan', 'proses pengajuan', 'diproses', 'proses penerimaan', 'proses pengadaan'], true)) {
            return 'yellow';
        }
        if (in_array($status_lower, ['disetujui', 'dikonfirmasi', 'diterima', 'selesai'], true)) {
            return 'green';
        }
        if (in_array($status_lower, ['ditolak', 'dibatalkan'], true)) {
            return 'red';
        }
        if ($status_lower === 'menunggu pengadaan') {
            return 'blue';
        }
        if (in_array($status_lower, ['pembelian diproses', 'pengajuan diproses', 'menunggu kiriman', 'barang sedang diperiksa', 'proses pengiriman'], true)) {
            return 'blue';
        }
        if (str_starts_with($status_lower, 'diterima ') && str_contains($status_lower, '%')) {
            return 'blue';
        }
        if (in_array($status_lower, ['menunggu persetujuan', 'menunggu pengajuan'], true)) {
            return 'yellow';
        }
        if (in_array($status_lower, ['pengadaan dibatalkan', 'pengajuan ditolak'], true)) {
            return 'red';
        }
        if ($status_lower === 'draft') {
            return 'gray';
        }
        if ($status_lower === 'masuk') {
            return 'blue';
        }
        if ($status_lower === 'keluar') {
            // status.php: oranye (#FED7AA) — tak ada padanan di get_progress_badge_html;
            // tak pernah tercapai oleh label Permintaan Barang.
            return 'yellow';
        }
        if ($status_lower === 'opname') {
            // status.php: ungu (#E9D5FF) — tak ada padanan; tak pernah tercapai di sini.
            return 'gray';
        }
        if ($status_lower === '-') {
            return 'gray';
        }
        if (str_starts_with($label, '+') && is_numeric(substr($label, 1))) {
            return 'blue';
        }
        if (is_numeric($label) && (int) $label < 0) {
            return 'red';
        }

        return 'gray';
    }
}

if (!function_exists('_progress_result')) {
    /**
     * @return array{0:string, 1:string}
     */
    function _progress_result(string $label): array
    {
        return [$label, _status_component_color($label)];
    }
}

if (!function_exists('_determine_progress')) {
    /** @return array{0:string, 1:string} */
    function _determine_progress(int $st, string $scenario, ?array $pj, ?array $pd, ?array $pn, int $persen): array
    {
        // Status terminal — kondisi hilir (pengajuan/pengadaan/penerimaan) tidak lagi
        // relevan, kembalikan langsung tanpa penelusuran. Warna TIDAK lagi
        // ditentukan di sini — selalu diturunkan dari label lewat
        // _status_component_color(), sama seperti daftar (status.php).
        if ($st === 6) return _progress_result('Selesai');
        if ($st === 3) return _progress_result('Ditolak');
        if ($st === 7) return _progress_result('Dibatalkan');
        if ($st === 8) return _progress_result('Proses Pengiriman');

        if ($st === 1) return _progress_result('Draf');
        // "Proses Permintaan" (bukan "Menunggu Persetujuan Permintaan"): exact-match
        // amber di status.php mensyaratkan persis frasa itu, bukan substring —
        // "Menunggu Persetujuan Permintaan" jatuh ke abu-abu (dikonfirmasi ke user).
        if ($st === 4) return _progress_result('Proses Permintaan');
        if ($st === 2 && $scenario === 'direct') return _progress_result('Selesai');

        // Status 5 — trace hilir. Label dipilih supaya cocok pola exact-match yang
        // SUDAH ADA di components/tabel/td/status.php (lihat _status_component_color()),
        // bukan istilah bebas — semuanya diverifikasi persis, bukan substring:
        //   - pengajuan belum diputuskan atasan       → "Proses Pengajuan" (amber)
        //   - disetujui, pengadaan belum dibuat        → "Menunggu Pengadaan" (biru)
        //   - pengadaan dibuat, belum diterima         → "Proses Pengadaan" (amber)
        //   - barang datang, sedang diperiksa          → "Proses Penerimaan" (amber)
        //   - diterima sebagian (N%)                   → "Proses Penerimaan" juga —
        //     persentase TIDAK disertakan di label ini (dikonfirmasi ke user): tidak
        //     ada bentuk berawalan "Proses Penerimaan" dengan sisipan apa pun yang
        //     lolos exact-match; satu-satunya pola biru untuk kasus ini mensyaratkan
        //     diawali kata "diterima " persis, bertentangan dengan mempertahankan
        //     "Proses Penerimaan" di depan. Detail persentase tetap ada di sub-baris
        //     timeline (_step_penerimaan_row()), hanya tidak di badge/progress_label ini.
        // Status kegagalan (Ditolak/Dibatalkan) TIDAK dilebur — itu kondisi
        // berbeda, bukan variasi istilah dari kondisi menunggu yang sama.
        if (!empty($pn) && (int) ($pn['id_status_penerimaan_barang'] ?? 0) === 2) {
            if ($persen >= 100) return _progress_result('Selesai');
            return _progress_result('Proses Penerimaan');
        }
        if (!empty($pn) && (int) ($pn['id_status_penerimaan_barang'] ?? 0) === 1) {
            return _progress_result('Proses Penerimaan');
        }
        if (!empty($pd)) {
            $s_pd = (int) ($pd['id_status_pengadaan_barang'] ?? 0);
            if ($s_pd === 3) return _progress_result('Pengadaan Dibatalkan');
            if ($s_pd === 2) return _progress_result('Proses Pengadaan');
            if ($s_pd === 1) return _progress_result('Proses Pengadaan');
        }
        if (!empty($pj)) {
            $s_pj = (int) ($pj['id_status_pengajuan_barang'] ?? 0);
            if ($s_pj === 3) return _progress_result('Pengajuan Ditolak');
            if ($s_pj === 2) return _progress_result('Menunggu Pengadaan');
            if ($s_pj === 4) return _progress_result('Proses Pengajuan');
        }

        return _progress_result('Proses Pengajuan');
    }
}

if (!function_exists('get_progress_badge_html')) {
    function get_progress_badge_html(string $label, string $color): string
    {
        $colors = [
            'green'  => 'background-color:#D1FAE5; color:#065F46;',
            'red'    => 'background-color:#FEE2E2; color:#991B1B;',
            'yellow' => 'background-color:#FEF3C7; color:#92400E;',
            'blue'   => 'background-color:#DBEAFE; color:#1E40AF;',
            'gray'   => 'background-color:#F3F4F6; color:#374151;',
        ];
        $style = $colors[$color] ?? $colors['gray'];
        return '<span style="display:inline-flex; align-items:center; padding:4px 10px; border-radius:9999px; font-size:12px; font-weight:600; ' . $style . '">' . esc($label) . '</span>';
    }
}


// ===========================
// TRACKING PENGAJUAN BARANG
// ===========================

if (!function_exists('get_pengajuan_tracking')) {
    /**
     * Progress tracking untuk Pengajuan Barang MANDIRI (bukan dari Permintaan —
     * untuk itu lihat get_permintaan_tracking()).
     * Alur: ① Pengajuan → ② Pengadaan → ③ Penerimaan → ④ Selesai
     *
     * Struktur `steps` sama seperti get_permintaan_tracking(): tiap langkah
     * _tstep(label, status, rows[, link]) berisi sub-baris _trow(text, date, tone).
     * Langkah ② & ③ memanggil ULANG _step_pengadaan_row()/_step_penerimaan_row()
     * dari get_permintaan_tracking() — kolom $pengadaan/$penerimaan/$pengajuan di
     * sini identik strukturnya, jadi tidak perlu duplikasi logika.
     * Dirender oleh app/Views/admin/inventorinonmedis/_timeline_pengajuan.php
     * (bukan lagi components/tracking/timeline.php).
     */
    function get_pengajuan_tracking(int $id_pengajuan): array
    {
        $config             = (new \Config\Database())->default;
        $config['database'] = env('database.default.khanza_db');
        $db                 = \Config\Database::connect($config);

        // Data pengajuan
        $pengajuan = $db->table('inventori_non_medis.pengajuan_barang pj')
            ->join('role.petugas pt', 'pj.atasan_logistik = pt.id_petugas', 'left')
            ->join('person.orang o', 'pt.id_orang = o.id_orang', 'left')
            ->join('role.petugas pg', 'pj.petugas_gudang = pg.id_petugas', 'left')
            ->join('person.orang og', 'pg.id_orang = og.id_orang', 'left')
            ->select('pj.*, o.nama AS nama_atasan, og.nama AS nama_pemohon')
            ->where('pj.id_pengajuan', $id_pengajuan)
            ->get()->getRowArray();

        if (empty($pengajuan)) {
            return ['scenario' => 'pengajuan', 'steps' => [], 'progress_label' => '-', 'progress_color' => 'gray'];
        }
        assert(is_array($pengajuan), 'Baris pengajuan harus array.');

        $st_pj = (int) ($pengajuan['id_status_pengajuan_barang'] ?? 0);

        // Cari pengadaan
        $pengadaan = $db->table('inventori_non_medis.pengadaan_barang pd')
            ->join('inventori_non_medis.suplier s', 'pd.id_suplier = s.id_suplier', 'left')
            ->select('pd.id_pengadaan, pd.no_pengadaan, pd.tanggal, pd.id_status_pengadaan_barang, s.nama_suplier')
            ->where('pd.id_pengajuan', $id_pengajuan)
            ->orderBy('pd.id_pengadaan', 'DESC')
            ->limit(1)
            ->get()->getRowArray();

        // Cari penerimaan
        $penerimaan = null;
        $persen_terima = 0;
        if (!empty($pengadaan)) {
            $penerimaan = $db->table('inventori_non_medis.penerimaan_barang')
                ->select('id_penerimaan, no_penerimaan, tanggal, id_status_penerimaan_barang')
                ->where('id_pengadaan', (int) $pengadaan['id_pengadaan'])
                ->where('id_status_penerimaan_barang', 2)
                ->orderBy('id_penerimaan', 'DESC')
                ->limit(1)
                ->get()->getRowArray();

            if (empty($penerimaan)) {
                $penerimaan = $db->table('inventori_non_medis.penerimaan_barang')
                    ->select('id_penerimaan, no_penerimaan, tanggal, id_status_penerimaan_barang')
                    ->where('id_pengadaan', (int) $pengadaan['id_pengadaan'])
                    ->orderBy('id_penerimaan', 'DESC')
                    ->limit(1)
                    ->get()->getRowArray();
            }

            $total_pesan = (int) ($db->table('inventori_non_medis.pengadaan_barang_detail')
                ->selectSum('qty', 'total')
                ->where('id_pengadaan', (int) $pengadaan['id_pengadaan'])
                ->where('id_barang >', 0)
                ->get()->getRowArray()['total'] ?? 0);

            $total_terima = (int) ($db->query("
                SELECT COALESCE(SUM(d.qty_diterima), 0) AS total
                FROM inventori_non_medis.penerimaan_barang_detail d
                JOIN inventori_non_medis.penerimaan_barang p ON d.id_penerimaan = p.id_penerimaan
                WHERE p.id_pengadaan = ? AND p.id_status_penerimaan_barang = 2
            ", [(int) $pengadaan['id_pengadaan']])->getRowArray()['total'] ?? 0);

            $persen_terima = $total_pesan > 0 ? min(100, (int) round(($total_terima / $total_pesan) * 100)) : 0;
        }
        assert($pengadaan === null || is_array($pengadaan), 'Baris pengadaan harus array atau null.');
        assert($penerimaan === null || is_array($penerimaan), 'Baris penerimaan harus array atau null.');

        // Build steps
        $steps = [];

        // ① Pengajuan — dua sub-baris: diajukan + keputusan atasan, terpisah
        // (bukan digabung satu baris seperti percobaan sebelumnya). Istilah
        // disamakan persis dengan _step_permintaan()/_step_pengajuan_row() di
        // get_permintaan_tracking() supaya konsisten di kedua jenis timeline.
        $pemohon = (string) ($pengajuan['nama_pemohon'] ?? '-');
        $atasan  = (string) ($pengajuan['nama_atasan'] ?? '-');
        $tgl     = isset($pengajuan['tanggal']) ? (string) $pengajuan['tanggal'] : null;
        $tgl_proses = isset($pengajuan['tanggal_diproses']) ? (string) $pengajuan['tanggal_diproses'] : $tgl;

        if ($st_pj === 1) {
            $steps[] = _tstep('Pengajuan', 'active', [_trow("Draf oleh {$pemohon}", $tgl, 'active')]);
        } else {
            $rows = [_trow("Diajukan oleh {$pemohon}", $tgl, 'done')];
            if ($st_pj === 2) {
                $rows[]  = _trow("Disetujui atasan {$atasan}", $tgl_proses, 'done');
                $steps[] = _tstep('Pengajuan', 'done', $rows);
            } elseif ($st_pj === 3) {
                $rows[]  = _trow("Ditolak atasan {$atasan}", $tgl_proses, 'failed');
                $steps[] = _tstep('Pengajuan', 'failed', $rows);
            } elseif ($st_pj === 4) {
                // Kosakata disamakan persis dengan cabang s_pj===4 di
                // _step_pengajuan_row() — kondisi yang sama harus terbaca sama
                // di kedua jenis timeline (Permintaan maupun Pengajuan mandiri).
                $rows[]  = _trow('Pengajuan diproses, menunggu atasan', $tgl, 'active');
                $steps[] = _tstep('Pengajuan', 'active', $rows);
            } else {
                $rows[]  = _trow('Menunggu persetujuan atasan', null, 'active');
                $steps[] = _tstep('Pengajuan', 'active', $rows);
            }
        }

        // ② Pengadaan — dipakai ulang dari get_permintaan_tracking(), kolom
        // $pengadaan/$pengajuan di sini identik strukturnya.
        $steps[] = _step_pengadaan_row($pengadaan, $pengajuan);

        // ③ Penerimaan — dipakai ulang juga. Parameter $st (status Permintaan)
        // diisi 0: pengajuan mandiri tak punya konsep status Permintaan sama
        // sekali, dan satu-satunya pemakaian $st di dalam fungsi itu adalah
        // cabang khusus `$st === 6` milik alur Permintaan — 0 tak pernah cocok,
        // jadi kelengkapan penerimaan di sini murni ditentukan $persen_terima.
        $steps[] = _step_penerimaan_row($penerimaan, $persen_terima, $pengadaan, 0);

        // ④ Selesai — murni cerminan otomatis status Penerimaan = Diterima lengkap
        // (100%), BUKAN langkah konfirmasi manusia terpisah: begitu penerimaan
        // dikonfirmasi Diterima, barang.stok sudah langsung bertambah dalam
        // transaksi yang sama (lihat
        // PenerimaanBarangController::create_transaksi_stok_masuk()).
        $penerimaan_selesai = !empty($penerimaan)
            && (int) ($penerimaan['id_status_penerimaan_barang'] ?? 0) === 2
            && $persen_terima >= 100;
        $tgl_selesai = isset($penerimaan['tanggal']) ? (string) $penerimaan['tanggal'] : null;
        $steps[]     = $penerimaan_selesai
            ? _tstep('Selesai', 'done', [_trow('Stok Diperbarui', $tgl_selesai, 'done')])
            : _tstep('Selesai', 'waiting', [_trow('Menunggu', null, null)]);

        // Progress label
        if ($st_pj === 3) { $progress_label = 'Ditolak'; $progress_color = 'red'; }
        elseif ($st_pj === 4) { $progress_label = 'Menunggu Persetujuan'; $progress_color = 'yellow'; }
        elseif (!empty($penerimaan) && (int) ($penerimaan['id_status_penerimaan_barang'] ?? 0) === 2 && $persen_terima >= 100) { $progress_label = 'Selesai'; $progress_color = 'green'; }
        elseif (!empty($penerimaan) && (int) ($penerimaan['id_status_penerimaan_barang'] ?? 0) === 2) { $progress_label = "Diterima {$persen_terima}%"; $progress_color = 'blue'; }
        elseif (!empty($pengadaan) && (int) ($pengadaan['id_status_pengadaan_barang'] ?? 0) === 3) { $progress_label = 'Pengadaan Dibatalkan'; $progress_color = 'red'; }
        elseif (!empty($pengadaan)) { $progress_label = 'Pembelian Diproses'; $progress_color = 'blue'; }
        elseif ($st_pj === 2) { $progress_label = 'Menunggu Pengadaan'; $progress_color = 'yellow'; }
        else { $progress_label = 'Diproses'; $progress_color = 'yellow'; }

        return compact('steps', 'progress_label', 'progress_color') + ['scenario' => 'pengajuan'];
    }
}


// ===========================
// TRACKING PENERIMAAN BARANG
// ===========================

if (!function_exists('get_penerimaan_tracking')) {
    /**
     * Progress tracking untuk Penerimaan Barang.
     * Alur: ① Penerimaan → ② Stok Masuk
     */
    function get_penerimaan_tracking(int $id_penerimaan): array
    {
        $config             = (new \Config\Database())->default;
        $config['database'] = env('database.default.khanza_db');
        $db                 = \Config\Database::connect($config);

        $penerimaan = $db->table('inventori_non_medis.penerimaan_barang p')
            ->join('inventori_non_medis.pengadaan_barang pd', 'p.id_pengadaan = pd.id_pengadaan', 'left')
            ->join('inventori_non_medis.suplier s', 'pd.id_suplier = s.id_suplier', 'left')
            ->select('p.*, pd.no_pengadaan, s.nama_suplier')
            ->where('p.id_penerimaan', $id_penerimaan)
            ->get()->getRowArray();

        if (empty($penerimaan)) {
            return ['scenario' => 'penerimaan', 'steps' => [], 'progress_label' => '-', 'progress_color' => 'gray'];
        }

        $s_pn = (int) ($penerimaan['id_status_penerimaan_barang'] ?? 0);

        $steps = [];

        // ① Penerimaan
        if ($s_pn === 2) $steps[] = _s('Penerimaan', 'done', 'Diterima', $penerimaan['tanggal'], $penerimaan['nama_suplier']);
        elseif ($s_pn === 3) $steps[] = _s('Penerimaan', 'failed', 'Ditolak', $penerimaan['tanggal'], null);
        else $steps[] = _s('Penerimaan', 'active', 'Sedang Diperiksa', $penerimaan['tanggal'], $penerimaan['nama_suplier']);

        // ② Stok Masuk
        if ($s_pn === 2 && !empty($penerimaan['no_masuk'])) {
            $steps[] = _s('Stok Masuk', 'done', 'Tercatat', $penerimaan['tanggal'], $penerimaan['no_masuk']);
        } elseif ($s_pn === 3) {
            $steps[] = _s('Stok Masuk', 'failed', 'Dibatalkan', null, null);
        } else {
            $steps[] = _s('Stok Masuk', 'waiting', 'Menunggu', null, null);
        }

        // Progress
        if ($s_pn === 2) { $pl = 'Selesai'; $pc = 'green'; }
        elseif ($s_pn === 3) { $pl = 'Ditolak'; $pc = 'red'; }
        else { $pl = 'Sedang Diperiksa'; $pc = 'yellow'; }

        return ['scenario' => 'penerimaan', 'steps' => $steps, 'progress_label' => $pl, 'progress_color' => $pc];
    }
}
