<?php

declare(strict_types=1);

namespace App\Features\InventoriNonMedis\TransaksiStok;

use CodeIgniter\Database\BaseConnection;
use CodeIgniter\Database\BaseResult;

/**
 * Penelusuran dokumen asal sebuah transaksi stok (penerimaan, permintaan, pengembalian, atau stok opname)
 * beserta lini masa alurnya, untuk ditampilkan pada halaman detail Transaksi Stok.
 */
final class TransaksiStokService
{
    private const URL = '/inventori-non-medis/';

    // [kolom id, kolom nomor, path detail] sesuai urutan tombol Dokumen Terkait
    private const DOKUMEN = [
        ['id_penerimaan',   'no_penerimaan',   'penerimaan-barang/'],
        ['id_pengadaan',    'no_pengadaan',    'pengadaan-barang/'],
        ['id_pengembalian', 'no_pengembalian', 'pengembalian-barang/'],
        ['id_permintaan',   'no_permintaan',   'permintaan-barang/'],
        ['id_pengajuan',    'no_pengajuan',    'pengajuan-barang/'],
        ['id_opname',       'no_opname',       'stok-opname/'],
    ];

    // id & nomor semua dokumen asal dalam satu query; pengajuan diambil dari pengadaan atau dari permintaan asal
    private const SQL = "
        WITH t AS (
            SELECT NULLIF(ts.id_opname, 0) AS id_opname, pn.id_penerimaan, pn.no_penerimaan,
                   pd.id_pengadaan, pd.no_pengadaan, pd.id_pengajuan AS pengajuan_pengadaan,
                   kb.id_pengembalian, kb.no_pengembalian,
                   COALESCE(NULLIF(pj.id_permintaan, 0), NULLIF(kb.id_permintaan, 0), NULLIF(ts.id_permintaan, 0)) AS id_permintaan
            FROM inventori_non_medis.transaksi_stok ts
            LEFT JOIN inventori_non_medis.penerimaan_barang pn ON pn.id_penerimaan = ts.id_penerimaan
            LEFT JOIN inventori_non_medis.pengadaan_barang pd ON pd.id_pengadaan = pn.id_pengadaan
            LEFT JOIN inventori_non_medis.pengajuan_barang pj ON pj.id_pengajuan = pd.id_pengajuan
            LEFT JOIN inventori_non_medis.pengembalian_barang kb ON kb.id_pengembalian = ts.id_pengembalian
            WHERE ts.id_transaksi = ?
        ), u AS (
            SELECT t.*, COALESCE(t.pengajuan_pengadaan, (
                SELECT x.id_pengajuan FROM inventori_non_medis.pengajuan_barang x
                WHERE x.id_permintaan = t.id_permintaan ORDER BY x.id_pengajuan DESC LIMIT 1
            )) AS id_pengajuan
            FROM t
        )
        SELECT u.*, pm.no_permintaan, pj.no_pengajuan, 'Stok Opname' AS no_opname
        FROM u
        LEFT JOIN inventori_non_medis.permintaan_barang pm ON pm.id_permintaan = u.id_permintaan
        LEFT JOIN inventori_non_medis.pengajuan_barang pj ON pj.id_pengajuan = u.id_pengajuan
    ";

    public function __construct(
        private BaseConnection $db,
    ) {}

    /**
     * Dokumen terkait, tautan Monitoring, dan lini masa alur dokumen asal sebuah transaksi stok.
     *
     * @return array{dokumen: list<array{0: string, 1: string}>, monitoring: string|null, tracking: array<array-key, mixed>|null, jenis: string}
     * @throws \CodeIgniter\Database\Exceptions\DatabaseException
     * @throws \CodeIgniter\Files\Exceptions\FileNotFoundException
     */
    public function alur(int $id_transaksi): array
    {
        $result = $this->db->query(self::SQL, [$id_transaksi]);
        assert($result instanceof BaseResult, 'Query gagal dieksekusi.');
        /** @var array<string, mixed> $r */
        $r = $result->getRowArray() ?? [];

        $dokumen = [];
        foreach (self::DOKUMEN as [$kolom_id, $kolom_no, $path]) {
            $id = (int) ($r[$kolom_id] ?? 0);
            if ($id > 0) {
                $dokumen[] = ['Lihat ' . (string) ($r[$kolom_no] ?? ''), self::URL . $path . $id];
            }
        }

        $id_permintaan = (int) ($r['id_permintaan'] ?? 0);
        $id_pengajuan  = (int) ($r['id_pengajuan'] ?? 0);

        helper('tracking');
        [$jenis, $tracking, $monitoring] = match (true) {
            (int) ($r['id_opname'] ?? 0) > 0 => ['opname', null, null],
            $id_permintaan > 0 => [
                'permintaan',
                get_permintaan_tracking($id_permintaan),
                self::URL . 'monitoring-transaksi/permintaan-' . $id_permintaan,
            ],
            $id_pengajuan > 0 => [
                'pengajuan',
                get_pengajuan_tracking($id_pengajuan),
                self::URL . 'monitoring-transaksi/pengajuan-' . $id_pengajuan,
            ],
            default => ['', null, null],
        };

        return ['dokumen' => $dokumen, 'monitoring' => $monitoring, 'tracking' => $tracking, 'jenis' => $jenis];
    }
}
