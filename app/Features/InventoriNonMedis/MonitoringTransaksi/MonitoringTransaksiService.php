<?php

declare(strict_types=1);

namespace App\Features\InventoriNonMedis\MonitoringTransaksi;

use CodeIgniter\Database\BaseConnection;
use CodeIgniter\Database\BaseResult;

/**
 * @phpstan-type Tautan array{label: string, url: string}
 * @phpstan-type Langkah array{
 *   judul: string,
 *   status: string,
 *   tahap: string,
 *   info: list<array{0: string, 1: string}>,
 *   dokumen: list<Tautan>,
 *   aksi: list<Tautan>,
 * }
 */
final class MonitoringTransaksiService
{
    private const PATH = 'inventori-non-medis/';

    private const TIPE_KELUAR = 2;

    public function __construct(
        private BaseConnection $db,
    ) {}

    // pastikan hasil query valid
    /** @throws \CodeIgniter\Database\Exceptions\DatabaseException */
    private function guarded(mixed $result): BaseResult
    {
        assert($result instanceof BaseResult, 'Query gagal dieksekusi.');
        return $result;
    }

    /**
     * @param list<mixed> $binds
     * @return list<array<string, mixed>>
     * @throws \CodeIgniter\Database\Exceptions\DatabaseException
     */
    private function rows(string $sql, array $binds = []): array
    {
        /** @var list<array<string, mixed>> */
        return $this->guarded($this->db->query($sql, $binds))->getResultArray();
    }

    /**
     * @param list<mixed> $binds
     * @return array<string, mixed>|null
     * @throws \CodeIgniter\Database\Exceptions\DatabaseException
     */
    private function row(string $sql, array $binds = []): null|array
    {
        $row = $this->guarded($this->db->query($sql, $binds))->getRowArray();
        /** @var array<string, mixed>|null */
        return is_array($row) ? $row : null;
    }

    // ========= DAFTAR ALUR =========

    // permintaan (selain Draf) dan pengajuan stok yang dibuat gudang sendiri
    private function sumber_alur(): string
    {
        return "
            SELECT 'permintaan' AS jenis, pb.id_permintaan AS id, pb.no_permintaan AS no_dokumen, pb.tanggal,
                   o.nama AS pemohon, r.nama_ruangan AS unit
            FROM inventori_non_medis.permintaan_barang pb
            LEFT JOIN role.petugas pt ON pb.petugas = pt.id_petugas
            LEFT JOIN person.orang o ON pt.id_orang = o.id_orang
            LEFT JOIN ruangan.ruangan r ON pb.master_ruangan = r.id_ruangan
            WHERE pb.id_permintaan > 0 AND pb.id_status_permintaan_barang <> 1
            UNION ALL
            SELECT 'pengajuan', pj.id_pengajuan, pj.no_pengajuan, pj.tanggal, o.nama, 'Gudang'
            FROM inventori_non_medis.pengajuan_barang pj
            LEFT JOIN role.petugas pt ON pj.petugas_gudang = pt.id_petugas
            LEFT JOIN person.orang o ON pt.id_orang = o.id_orang
            WHERE pj.id_pengajuan > 0 AND COALESCE(pj.id_permintaan, 0) = 0 AND pj.id_status_pengajuan_barang <> 1
        ";
    }

    /**
     * Daftar alur transaksi beserta tahap saat ini, diurutkan Proses - Selesai - Dibatalkan lalu terbaru di atas.
     * Status dihitung dari alur, jadi semua baris ditelusuri dulu lalu dipotong per halaman.
     * Tanggal (Y-m-d) boleh kosong.
     *
     * @return array{rows: list<array<string, mixed>>, total: int}
     * @throws \CodeIgniter\Database\Exceptions\DatabaseException
     */
    public function daftar(int $page, int $size, string $keyword, string $dari = '', string $sampai = ''): array
    {
        $kw     = '%' . addcslashes($keyword, '%_\\') . '%';
        $filter = "WHERE (? = '' OR t.no_dokumen ILIKE ? OR t.pemohon ILIKE ? OR t.unit ILIKE ?)
            AND (? = '' OR t.tanggal::date >= NULLIF(?, '')::date)
            AND (? = '' OR t.tanggal::date <= NULLIF(?, '')::date)";
        $binds = [$keyword, $kw, $kw, $kw, $dari, $dari, $sampai, $sampai];

        $semua = $this->lengkapi($this->rows(
            'SELECT * FROM (' . $this->sumber_alur() . ") t {$filter} ORDER BY t.tanggal DESC, t.id DESC",
            $binds,
        ));
        $peringkat = static fn(array $r): int => match ($r['status']) {
            'Diproses' => 1,
            'Selesai'  => 2,
            default    => 3,
        };
        // usort stabil sejak PHP 8, urutan terbaru di dalam tiap kelompok tetap
        usort($semua, static fn(array $a, array $b): int => $peringkat($a) <=> $peringkat($b));

        return ['rows' => array_slice($semua, ($page - 1) * $size, $size), 'total' => count($semua)];
    }

    /**
     * Tambahkan kunci, jenis, status, dan tahap saat ini ke tiap baris daftar.
     *
     * @param list<array<string, mixed>> $rows
     * @return list<array<string, mixed>>
     * @throws \CodeIgniter\Database\Exceptions\DatabaseException
     */
    private function lengkapi(array $rows): array
    {
        foreach ($rows as &$row) {
            $alur = $row['jenis'] === 'permintaan'
                ? $this->alur_permintaan((int) $row['id'])
                : $this->alur_pengajuan((int) $row['id']);
            $row['kunci']       = (string) $row['jenis'] . '-' . (int) $row['id'];
            $row['jenis_label'] = $row['jenis'] === 'permintaan' ? 'Permintaan Unit' : 'Pengajuan Gudang';
            $row['status']      = $alur === null ? '-' : $alur['status'];
            $row['tahap']       = $alur === null ? '-' : $alur['tahap'];
        }
        unset($row);

        return $rows;
    }

    // ========= ALUR PERMINTAAN =========

    /**
     * Seluruh tahap satu permintaan dari diajukan sampai selesai.
     *
     * @return array{header: array<string, mixed>, langkah: list<Langkah>, status: string, tahap: string, warna: string, progres: string, peringatan: list<Tautan>}|null
     * @throws \CodeIgniter\Database\Exceptions\DatabaseException
     */
    public function alur_permintaan(int $id): null|array
    {
        $p = $this->row('
            SELECT pb.*, o.nama AS nama_pemohon, og.nama AS nama_pengelola, opn.nama AS nama_penerima,
                   r.nama_ruangan
            FROM inventori_non_medis.permintaan_barang pb
            LEFT JOIN role.petugas pt ON pb.petugas = pt.id_petugas
            LEFT JOIN person.orang o ON pt.id_orang = o.id_orang
            LEFT JOIN role.petugas pg ON pb.petugas_gudang = pg.id_petugas
            LEFT JOIN person.orang og ON pg.id_orang = og.id_orang
            LEFT JOIN role.petugas ppn ON pb.petugas_penerima = ppn.id_petugas
            LEFT JOIN person.orang opn ON ppn.id_orang = opn.id_orang
            LEFT JOIN ruangan.ruangan r ON pb.master_ruangan = r.id_ruangan
            WHERE pb.id_permintaan = ?
        ', [$id]);
        $st = (int) ($p['id_status_permintaan_barang'] ?? 0);
        if ($p === null || $st === 1)
            return null;

        $url_p  = self::PATH . 'permintaan-barang/' . $id;
        $url_pp = self::PATH . 'persetujuan-permintaan-barang/' . $id;

        $qty = $this->row('
            SELECT COALESCE(SUM(qty), 0) AS diminta, COALESCE(SUM(qty_disetujui), 0) AS disetujui
            FROM inventori_non_medis.permintaan_barang_detail WHERE id_permintaan = ?
        ', [$id]);
        $diminta   = (int) ($qty['diminta'] ?? 0);
        $disetujui = (int) ($qty['disetujui'] ?? 0);

        $langkah   = [];
        $langkah[] = $this->langkah('Permintaan Diajukan', 'done', [
            'info'    => [
                ['No. Permintaan', (string) ($p['no_permintaan'] ?? '-')],
                ['Tanggal', $this->tgl($p['tanggal'] ?? null)],
                ['Pemohon', (string) ($p['nama_pemohon'] ?? '-')],
                ['Ruangan', (string) ($p['nama_ruangan'] ?? '-')],
                ['Jumlah Diminta', $diminta . ' barang'],
                [
                    'Metode Pemenuhan',
                    $this->boleh_sebagian($p['boleh_pengiriman_sebagian'] ?? null)
                        ? 'Boleh Sebagian'
                        : 'Tunggu Lengkap',
                ],
            ],
            'dokumen' => [['label' => 'Lihat Permintaan', 'url' => $url_p]],
        ]);

        // persetujuan staf gudang
        if ($st === 4) {
            $langkah[] = $this->langkah('Persetujuan Staf Gudang', 'active', [
                'tahap' => 'Menunggu persetujuan Staf Gudang',
                'aksi'  => [
                    [
                        'label' => 'Proses Persetujuan',
                        'url'   => self::PATH . 'persetujuan-permintaan-barang/edit/' . $id,
                    ],
                ],
            ]);
        } else {
            $info = [
                ['Keputusan', $st === 3 ? 'Ditolak' : 'Disetujui'],
                ['Tanggal', $this->tgl($p['tanggal_diproses'] ?? null)],
                ['Staf Gudang', (string) ($p['nama_pengelola'] ?? '-')],
            ];
            if ($st !== 3) {
                $info[] = ['Jumlah Disetujui', "{$disetujui}/{$diminta} barang"];
            }
            $langkah[] = $this->langkah('Persetujuan Staf Gudang', $st === 3 ? 'failed' : 'done', [
                'info'    => $info,
                'dokumen' => [
                    ['label' => 'Lihat Persetujuan', 'url' => $url_pp],
                ],
            ]);
        }

        // pengajuan, pengadaan, penerimaan (hanya kalau stok kurang)
        $pengajuan = $this->rows('SELECT id_pengajuan FROM inventori_non_medis.pengajuan_barang WHERE id_permintaan = ? ORDER BY id_pengajuan', [
            $id,
        ]);
        foreach ($pengajuan as $pj) {
            foreach ($this->langkah_pengadaan((int) $pj['id_pengajuan']) as $l) {
                $langkah[] = $l;
            }
        }

        // pengeluaran barang ke unit
        $keluar = $this->rows('
            SELECT ts.id_transaksi, ts.tanggal, COALESCE(SUM(d.qty), 0) AS qty
            FROM inventori_non_medis.transaksi_stok ts
            LEFT JOIN inventori_non_medis.transaksi_stok_detail d ON d.id_transaksi = ts.id_transaksi
            WHERE ts.id_permintaan = ? AND ts.id_tipe_transaksi_stok = ?
            GROUP BY ts.id_transaksi, ts.tanggal
            ORDER BY ts.id_transaksi
        ', [$id, self::TIPE_KELUAR]);
        if ($keluar !== []) {
            $total_kirim = (int) array_sum(array_map(fn(array $kl): int => (int) $kl['qty'], $keluar));
            $info        = [
                ['No. Keluar', (string) ($p['no_keluar'] ?? '-')],
                ['Total Dikirim', "{$total_kirim}/{$disetujui} barang"],
            ];
            $dokumen   = [];
            $kumulatif = 0;
            foreach ($keluar as $k => $kl) {
                $kumulatif += (int) $kl['qty'];
                $info[]    = [
                    'Pengiriman ' . ($k + 1),
                    $this->tgl($kl['tanggal'] ?? null)
                        . ' ('
                        . (int) $kl['qty']
                        . " barang, total {$kumulatif}/{$disetujui})",
                ];
                $dokumen[] = [
                    'label' => 'Lihat Transaksi Stok ' . ($k + 1),
                    'url'   => self::PATH . 'transaksi-stok/' . (int) $kl['id_transaksi'],
                ];
            }
            // belum lengkap = masih berjalan (biru), kecuali permintaan sudah selesai
            $kurang = $total_kirim < $disetujui && $st !== 6;
            if ($kurang) {
                $info[] = ['Belum Dikirim', ($disetujui - $total_kirim) . ' barang (menunggu barang dari pengadaan)'];
            }
            $langkah[] = $this->langkah('Barang Dikirim ke Unit', $kurang ? 'active' : 'done', [
                'tahap'   => $kurang ? "Dikirim sebagian ({$total_kirim}/{$disetujui})" : '',
                'info'    => $info,
                'dokumen' => $dokumen,
            ]);
        } elseif (!in_array($st, [3, 7], true)) {
            $langkah[] = $this->langkah('Barang Dikirim ke Unit', 'waiting');
        }

        // konfirmasi terima
        if ($st === 8) {
            $langkah[] = $this->langkah('Konfirmasi Penerimaan Unit', 'active', [
                'tahap' => 'Menunggu konfirmasi terima',
                'aksi'  => [
                    ['label' => 'Konfirmasi Terima', 'url' => $url_pp],
                ],
            ]);
        } elseif ($st === 6) {
            $langkah[] = $this->langkah('Konfirmasi Penerimaan Unit', 'done', [
                'info' => [
                    ['Diterima Oleh', (string) ($p['nama_penerima'] ?? '-')],
                    ['Tanggal', $this->tgl($p['tanggal_diterima'] ?? null)],
                ],
            ]);
        } elseif (!in_array($st, [3, 7], true)) {
            $langkah[] = $this->langkah('Konfirmasi Penerimaan Unit', 'waiting');
        }

        $langkah[] = match ($st) {
            6       => $this->langkah('Selesai', 'done'),
            3       => $this->langkah('Ditolak', 'failed'),
            7       => $this->langkah('Dibatalkan', 'failed'),
            default => $this->langkah('Selesai', 'waiting'),
        };
        if ($st === 7) {
            $langkah = $this->redupkan($langkah);
        }

        // pengajuan pembatalan yang belum diputuskan
        $peringatan = [];
        if (
            in_array(strtolower((string) ($p['pengajuan_pembatalan'] ?? '')), ['t', '1', 'true'], true)
            && in_array($st, [4, 5], true)
        ) {
            $peringatan[] = [
                'label' => 'Ada pengajuan pembatalan yang menunggu keputusan Staf Gudang',
                'url'   => $url_pp,
            ];
        }

        // pengembalian dari unit menjadi tahap terakhir; status permintaan tetap dihitung dari alur utamanya
        $ringkasan = $this->ringkasan($langkah);
        $kembali   = $this->langkah_pengembalian($id);
        if ($kembali !== null) {
            $langkah[] = $kembali;
            if ($kembali['status'] === 'active') {
                $ringkasan['tahap'] .= ', pengembalian menunggu persetujuan';
            }
        }

        return ['header' => $p, 'langkah' => $langkah, 'peringatan' => $peringatan] + $ringkasan;
    }

    /**
     * Tahap pengembalian barang dari unit untuk satu permintaan, atau null bila tidak ada pengembalian.
     *
     * @return Langkah|null
     * @throws \CodeIgniter\Database\Exceptions\DatabaseException
     */
    private function langkah_pengembalian(int $id_permintaan): null|array
    {
        $rows = $this->rows('
            SELECT k.id_pengembalian, k.no_pengembalian, k.tanggal, k.tanggal_verifikasi,
                   k.id_status_pengembalian_barang AS st, op.nama AS pengaju, og.nama AS staf,
                   (SELECT COALESCE(SUM(d.qty_diajukan), 0) FROM inventori_non_medis.pengembalian_barang_detail d
                    WHERE d.id_pengembalian = k.id_pengembalian) AS diajukan,
                   (SELECT COALESCE(SUM(d.qty_diverifikasi), 0) FROM inventori_non_medis.pengembalian_barang_detail d
                    WHERE d.id_pengembalian = k.id_pengembalian) AS disetujui
            FROM inventori_non_medis.pengembalian_barang k
            LEFT JOIN role.petugas pp ON k.petugas = pp.id_petugas
            LEFT JOIN person.orang op ON pp.id_orang = op.id_orang
            LEFT JOIN role.petugas pg ON k.petugas_gudang = pg.id_petugas
            LEFT JOIN person.orang og ON pg.id_orang = og.id_orang
            WHERE k.id_permintaan = ?
            ORDER BY k.id_pengembalian
        ', [$id_permintaan]);
        if ($rows === [])
            return null;

        $info    = [];
        $dokumen = [];
        $aksi    = [];
        foreach ($rows as $k) {
            $id_k     = (int) $k['id_pengembalian'];
            $diajukan = (int) $k['diajukan'];
            $staf     = (string) ($k['staf'] ?? '-');
            $info[]   = [
                (string) $k['no_pengembalian'],
                $this->tgl($k['tanggal'] ?? null)
                    . ', '
                    . $diajukan
                    . ' barang diajukan oleh '
                    . (string) ($k['pengaju'] ?? '-'),
            ];
            $info[] = match ((int) $k['st']) {
                1       => ['Status', 'Draf (belum diajukan)'],
                2       => ['Status', 'Menunggu persetujuan Staf Gudang'],
                3 => [
                    'Disetujui',
                    (int) $k['disetujui']
                        . "/{$diajukan} barang oleh {$staf}, "
                        . $this->tgl($k['tanggal_verifikasi'] ?? null),
                ],
                default => ['Ditolak', "oleh {$staf}, " . $this->tgl($k['tanggal_verifikasi'] ?? null)],
            };
            $dokumen[] = [
                'label' => 'Lihat ' . (string) $k['no_pengembalian'],
                'url'   => self::PATH . 'pengembalian-barang/' . $id_k,
            ];
            if ((int) $k['st'] === 2) {
                $aksi[] = [
                    'label' => 'Proses Persetujuan Pengembalian',
                    'url'   => self::PATH . 'persetujuan-pengembalian-barang/edit/' . $id_k,
                ];
            }
        }

        $status_semua = array_map(fn(array $k): int => (int) $k['st'], $rows);
        $status       = match (true) {
            in_array(2, $status_semua, true) => 'active',
            array_intersect([3, 4], $status_semua) !== [] => 'done',
            default => 'waiting',
        };

        return $this->langkah('Pengembalian Barang', $status, [
            'tahap'   => $status === 'active' ? 'Menunggu persetujuan pengembalian' : '',
            'info'    => $info,
            'dokumen' => $dokumen,
            'aksi'    => $aksi,
        ]);
    }

    // ========= ALUR PENGAJUAN (DARI GUDANG) =========

    /**
     * @return array{header: array<string, mixed>, langkah: list<Langkah>, status: string, tahap: string, warna: string, progres: string, peringatan: list<Tautan>}|null
     * @throws \CodeIgniter\Database\Exceptions\DatabaseException
     */
    public function alur_pengajuan(int $id): null|array
    {
        $pj = $this->row('
            SELECT pj.*, o.nama AS nama_pemohon
            FROM inventori_non_medis.pengajuan_barang pj
            LEFT JOIN role.petugas pt ON pj.petugas_gudang = pt.id_petugas
            LEFT JOIN person.orang o ON pt.id_orang = o.id_orang
            WHERE pj.id_pengajuan = ?
        ', [$id]);
        $st = (int) ($pj['id_status_pengajuan_barang'] ?? 0);
        if ($pj === null || $st === 1)
            return null;

        $langkah = $this->langkah_pengadaan($id);

        // selesai kalau semua barang sudah dipesan dan diterima
        $semua_selesai = array_filter($langkah, fn(array $l): bool => $l['status'] !== 'done') === [];

        $langkah[] = match (true) {
            $st === 3 => $this->langkah('Ditolak', 'failed'),
            $semua_selesai => $this->langkah('Selesai', 'done', [
                'info' => [['Keterangan', 'Stok gudang sudah bertambah']],
            ]),
            default        => $this->langkah('Selesai', 'waiting'),
        };

        return ['header' => $pj, 'langkah' => $langkah, 'peringatan' => []] + $this->ringkasan($langkah);
    }

    // ========= TAHAP PENGAJUAN → PENGADAAN → PENERIMAAN =========

    /**
     * @return list<Langkah>
     * @throws \CodeIgniter\Database\Exceptions\DatabaseException
     */
    private function langkah_pengadaan(int $id_pengajuan): array
    {
        $pj = $this->row('
            SELECT pj.*, o.nama AS nama_pemohon, oa.nama AS nama_atasan
            FROM inventori_non_medis.pengajuan_barang pj
            LEFT JOIN role.petugas pt ON pj.petugas_gudang = pt.id_petugas
            LEFT JOIN person.orang o ON pt.id_orang = o.id_orang
            LEFT JOIN role.petugas pa ON pj.atasan_logistik = pa.id_petugas
            LEFT JOIN person.orang oa ON pa.id_orang = oa.id_orang
            WHERE pj.id_pengajuan = ?
        ', [$id_pengajuan]);
        if ($pj === null)
            return [];

        $st      = (int) ($pj['id_status_pengajuan_barang'] ?? 0);
        $langkah = [];

        $qty_pj = $this->row('
            SELECT COALESCE(SUM(qty), 0) AS diajukan, COALESCE(SUM(qty_disetujui), 0) AS disetujui
            FROM inventori_non_medis.pengajuan_barang_detail WHERE id_pengajuan = ?
        ', [$id_pengajuan]);
        $diajukan  = (int) ($qty_pj['diajukan'] ?? 0);
        $disetujui = (int) ($qty_pj['disetujui'] ?? 0);

        $langkah[] = $this->langkah('Pengajuan Barang Dibuat', 'done', [
            'info'    => [
                ['No. Pengajuan', (string) ($pj['no_pengajuan'] ?? '-')],
                ['Tanggal', $this->tgl($pj['tanggal'] ?? null)],
                ['Dibuat Oleh', (string) ($pj['nama_pemohon'] ?? '-')],
                ['Jumlah Diajukan', $diajukan . ' barang'],
            ],
            'dokumen' => [['label' => 'Lihat Pengajuan', 'url' => self::PATH . 'pengajuan-barang/' . $id_pengajuan]],
        ]);

        // persetujuan atasan logistik
        if ($st === 4 || $st === 1) {
            $langkah[] = $this->langkah('Persetujuan Atasan Logistik', 'active', [
                'tahap' => 'Menunggu persetujuan Atasan Logistik',
                'aksi'  => $st === 4
                    ? [[
                        'label' => 'Proses Persetujuan',
                        'url'   => self::PATH . 'persetujuan-pengajuan-barang/edit/' . $id_pengajuan,
                    ]]
                    : [],
            ]);
            $langkah[] = $this->langkah('Pengadaan ke Suplier', 'waiting');
            $langkah[] = $this->langkah('Penerimaan Barang', 'waiting');
            return $langkah;
        }
        $info_setuju = [
            ['Keputusan', $st === 3 ? 'Ditolak' : 'Disetujui'],
            ['Tanggal', $this->tgl($pj['tanggal_diproses'] ?? null)],
            ['Atasan Logistik', (string) ($pj['nama_atasan'] ?? '-')],
        ];
        if ($st !== 3) {
            $info_setuju[] = ['Jumlah Disetujui', "{$disetujui}/{$diajukan} barang"];
        }
        $langkah[] = $this->langkah('Persetujuan Atasan Logistik', $st === 3 ? 'failed' : 'done', [
            'info'    => $info_setuju,
            'dokumen' => [[
                'label' => 'Lihat Persetujuan',
                'url'   => self::PATH . 'persetujuan-pengajuan-barang/' . $id_pengajuan,
            ]],
        ]);
        if ($st === 3)
            return $langkah;

        // pengadaan
        $pengadaan = $this->rows('
            SELECT pd.id_pengadaan, pd.no_pengadaan, pd.tanggal, pd.id_status_pengadaan_barang AS st, s.nama_suplier,
                   o.nama AS nama_petugas,
                   (SELECT COALESCE(SUM(d.qty), 0) FROM inventori_non_medis.pengadaan_barang_detail d
                    WHERE d.id_pengadaan = pd.id_pengadaan AND d.id_barang > 0) AS qty
            FROM inventori_non_medis.pengadaan_barang pd
            LEFT JOIN inventori_non_medis.suplier s ON pd.id_suplier = s.id_suplier
            LEFT JOIN role.petugas pt ON pd.petugas = pt.id_petugas
            LEFT JOIN person.orang o ON pt.id_orang = o.id_orang
            WHERE pd.id_pengajuan = ?
            ORDER BY pd.id_pengadaan
        ', [$id_pengajuan]);
        $sisa_pesan = $this->sisa_pengajuan($id_pengajuan);
        $info       = [];
        $dokumen    = [];
        $dipesan    = 0;
        foreach ($pengadaan as $pd) {
            $status_pd = match ((int) $pd['st']) {
                1       => 'Proses Pengadaan',
                2       => 'Selesai (Dipesan)',
                3       => 'Dibatalkan',
                default => '-',
            };
            if ((int) $pd['st'] !== 3) {
                $dipesan += (int) $pd['qty'];
            }
            $info[] = [
                (string) $pd['no_pengadaan'],
                $this->tgl($pd['tanggal'] ?? null)
                    . ', '
                    . (string) ($pd['nama_suplier'] ?? '-')
                    . ', '
                    . (int) $pd['qty']
                    . ' barang, '
                    . $status_pd,
            ];
            $info[]    = ['Petugas Pengadaan', (string) ($pd['nama_petugas'] ?? '-')];
            $dokumen[] = [
                'label' => 'Lihat ' . (string) $pd['no_pengadaan'],
                'url'   => self::PATH . 'pengadaan-barang/' . (int) $pd['id_pengadaan'],
            ];
            if ((int) $pd['st'] !== 3) {
                $dokumen[] = [
                    'label' => 'Cetak Surat Pemesanan',
                    'url'   => self::PATH . 'pengadaan-barang/cetak/' . (int) $pd['id_pengadaan'],
                ];
            }
        }
        $aksi_pesan = $sisa_pesan > 0
            ? [[
                'label' => 'Buat Pengadaan',
                'url'   => self::PATH . 'pengadaan-barang/tambah?id_pengajuan=' . $id_pengajuan,
            ]]
            : [];
        $aktif = array_values(array_filter($pengadaan, fn(array $r): bool => (int) $r['st'] !== 3));
        if ($aktif === []) {
            $langkah[] = $this->langkah('Pengadaan ke Suplier', 'active', [
                'tahap'   => 'Menunggu pembuatan pengadaan',
                'info'    => $info,
                'dokumen' => $dokumen,
                'aksi'    => $aksi_pesan,
            ]);
            $langkah[] = $this->langkah('Penerimaan Barang', 'waiting');
            return $langkah;
        }
        array_unshift($info, ['Total Dipesan', "{$dipesan}/{$disetujui} barang"]);
        if ($sisa_pesan > 0) {
            $info[] = ['Belum Dipesan', $sisa_pesan . ' barang'];
        }
        // pengadaan berstatus Proses masih bisa diubah
        $belum_final = array_values(array_filter($aktif, fn(array $r): bool => (int) $r['st'] === 1));
        foreach ($belum_final as $pd) {
            $aksi_pesan[] = [
                'label' => 'Lanjutkan ' . (string) $pd['no_pengadaan'],
                'url'   => self::PATH . 'pengadaan-barang/edit/' . (int) $pd['id_pengadaan'],
            ];
        }
        $tahap_pesan = match (true) {
            $sisa_pesan > 0 => 'Sebagian barang belum dipesan',
            $belum_final !== [] => 'Pengadaan belum diselesaikan',
            default => '',
        };
        $langkah[] = $this->langkah('Pengadaan ke Suplier', $tahap_pesan !== '' ? 'active' : 'done', [
            'tahap'   => $tahap_pesan,
            'info'    => $info,
            'dokumen' => $dokumen,
            'aksi'    => $aksi_pesan,
        ]);

        // penerimaan
        $langkah[] = $this->langkah_penerimaan($aktif);

        return $langkah;
    }

    /**
     * @param list<array<string, mixed>> $pengadaan pengadaan yang tidak dibatalkan
     * @return Langkah
     * @throws \CodeIgniter\Database\Exceptions\DatabaseException
     */
    private function langkah_penerimaan(array $pengadaan): array
    {
        $info         = [];
        $dokumen      = [];
        $aksi         = [];
        $total_pesan  = 0;
        $total_terima = 0;

        foreach ($pengadaan as $pd) {
            $id_pd = (int) $pd['id_pengadaan'];
            $qty   = $this->row('
                SELECT
                    (SELECT COALESCE(SUM(qty), 0) FROM inventori_non_medis.pengadaan_barang_detail
                     WHERE id_pengadaan = ? AND id_barang > 0) AS pesan,
                    (SELECT COALESCE(SUM(d.qty_diterima), 0) FROM inventori_non_medis.penerimaan_barang_detail d
                     JOIN inventori_non_medis.penerimaan_barang p ON d.id_penerimaan = p.id_penerimaan
                     WHERE p.id_pengadaan = ? AND p.id_status_penerimaan_barang = 2) AS terima
            ', [$id_pd, $id_pd]);
            $pesan        = (int) ($qty['pesan'] ?? 0);
            $terima       = (int) ($qty['terima'] ?? 0);
            $total_pesan  += $pesan;
            $total_terima += $terima;

            $penerimaan = $this->rows('
                SELECT p.id_penerimaan, p.no_penerimaan, p.tanggal, p.id_status_penerimaan_barang AS st, o.nama AS nama_penerima,
                       (SELECT COALESCE(SUM(d.qty_diterima), 0) FROM inventori_non_medis.penerimaan_barang_detail d
                        WHERE d.id_penerimaan = p.id_penerimaan) AS qty
                FROM inventori_non_medis.penerimaan_barang p
                LEFT JOIN role.petugas pt ON p.petugas = pt.id_petugas
                LEFT JOIN person.orang o ON pt.id_orang = o.id_orang
                WHERE p.id_pengadaan = ?
                ORDER BY p.id_penerimaan
            ', [$id_pd]);
            $sedang_diproses = null;
            foreach ($penerimaan as $pn) {
                $status_pn = match ((int) $pn['st']) {
                    1       => 'Proses Penerimaan',
                    2       => 'Diterima',
                    3       => 'Ditolak',
                    default => '-',
                };
                $info[] = [
                    (string) ($pn['no_penerimaan'] ?? '-'),
                    $this->tgl($pn['tanggal'] ?? null)
                        . ', '
                        . (int) $pn['qty']
                        . ' barang dari '
                        . (string) $pd['no_pengadaan']
                        . ', '
                        . $status_pn,
                ];
                $info[]    = ['Penerima', (string) ($pn['nama_penerima'] ?? '-')];
                $dokumen[] = [
                    'label' => 'Lihat ' . (string) ($pn['no_penerimaan'] ?? 'Penerimaan'),
                    'url'   => self::PATH . 'penerimaan-barang/' . (int) $pn['id_penerimaan'],
                ];
                if ((int) $pn['st'] === 1) {
                    $sedang_diproses = (int) $pn['id_penerimaan'];
                }
            }

            if ($sedang_diproses !== null) {
                $aksi[] = [
                    'label' => 'Lanjutkan Penerimaan',
                    'url'   => self::PATH . 'penerimaan-barang/edit/' . $sedang_diproses,
                ];
            } elseif ($terima < $pesan) {
                $aksi[] = [
                    'label' => 'Buat Penerimaan ' . (string) $pd['no_pengadaan'],
                    'url'   => self::PATH . 'penerimaan-barang/tambah?id_pengadaan=' . $id_pd,
                ];
            }
        }

        array_unshift($info, ['Total Diterima', "{$total_terima}/{$total_pesan} barang"]);
        $lengkap = $total_pesan > 0 && $total_terima >= $total_pesan;

        return $this->langkah('Penerimaan Barang', $lengkap ? 'done' : 'active', [
            'tahap'   => $lengkap
                ? ''
                : (
                    $total_terima > 0
                        ? "Barang diterima sebagian ({$total_terima}/{$total_pesan})"
                        : 'Menunggu barang dari suplier'
                ),
            'info'    => $info,
            'dokumen' => $dokumen,
            'aksi'    => $aksi,
        ]);
    }

    // sisa qty pengajuan yang belum dipesan (pengadaan dibatalkan tidak dihitung)
    /** @throws \CodeIgniter\Database\Exceptions\DatabaseException */
    private function sisa_pengajuan(int $id_pengajuan): int
    {
        $row = $this->row('
            SELECT
                (SELECT COALESCE(SUM(qty_disetujui), 0) FROM inventori_non_medis.pengajuan_barang_detail
                 WHERE id_pengajuan = ? AND id_barang > 0) AS disetujui,
                (SELECT COALESCE(SUM(d.qty), 0) FROM inventori_non_medis.pengadaan_barang_detail d
                 JOIN inventori_non_medis.pengadaan_barang p ON d.id_pengadaan = p.id_pengadaan
                 WHERE p.id_pengajuan = ? AND p.id_status_pengadaan_barang <> 3 AND d.id_barang > 0) AS dipesan
        ', [$id_pengajuan, $id_pengajuan]);

        return max(0, (int) ($row['disetujui'] ?? 0) - (int) ($row['dipesan'] ?? 0));
    }

    // ========= BANTUAN =========

    // satu tahap; isi boleh memuat tahap (keterangan saat aktif), info, dokumen, dan aksi
    /**
     * @param array{tahap?: string, info?: list<array{0: string, 1: string}>, dokumen?: list<Tautan>, aksi?: list<Tautan>} $isi
     * @return Langkah
     */
    private function langkah(string $judul, string $status, array $isi = []): array
    {
        return [
            'judul'   => $judul,
            'status'  => $status,
            'tahap'   => $isi['tahap'] ?? '',
            'info'    => $isi['info'] ?? [],
            'dokumen' => $isi['dokumen'] ?? [],
            'aksi'    => $isi['aksi'] ?? [],
        ];
    }

    // status akhir, tahap saat ini, warna badge, dan jumlah tahap selesai
    /**
     * @param list<Langkah> $langkah
     * @return array{status: string, tahap: string, warna: string, progres: string}
     */
    private function ringkasan(array $langkah): array
    {
        $selesai = count(array_filter($langkah, fn(array $l): bool => $l['status'] === 'done'));
        $progres = $selesai . ' dari ' . count($langkah) . ' tahap selesai';
        $akhir   = $langkah[count($langkah) - 1];

        if ($akhir['status'] === 'failed') {
            return ['status' => $akhir['judul'], 'tahap' => $akhir['judul'], 'warna' => 'red', 'progres' => $progres];
        }
        if ($akhir['status'] === 'done') {
            return ['status' => 'Selesai', 'tahap' => 'Selesai', 'warna' => 'green', 'progres' => $progres];
        }
        foreach ($langkah as $l) {
            if ($l['status'] === 'active') {
                $tahap = $l['tahap'] !== '' ? $l['tahap'] : $l['judul'];
                return ['status' => 'Diproses', 'tahap' => $tahap, 'warna' => 'yellow', 'progres' => $progres];
            }
        }
        return ['status' => 'Diproses', 'tahap' => 'Diproses', 'warna' => 'yellow', 'progres' => $progres];
    }

    // permintaan dibatalkan: tahap yang masih berjalan tidak lagi aktif
    /**
     * @param list<Langkah> $langkah
     * @return list<Langkah>
     */
    private function redupkan(array $langkah): array
    {
        foreach ($langkah as &$l) {
            if ($l['status'] === 'active') {
                $l['status'] = 'waiting';
                $l['aksi']   = [];
            }
        }
        unset($l);
        return $langkah;
    }

    private function tgl(mixed $value): string
    {
        if (!is_string($value) || $value === '')
            return '-';
        $time = strtotime($value);
        return $time === false ? '-' : date('d/m/Y, H:i', $time);
    }

    private function boleh_sebagian(mixed $value): bool
    {
        return in_array(strtolower((string) ($value ?? 'f')), ['1', 't', 'true', 'y', 'yes'], true);
    }
}
