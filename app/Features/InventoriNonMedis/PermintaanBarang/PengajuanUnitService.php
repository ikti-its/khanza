<?php

declare(strict_types=1);

namespace App\Features\InventoriNonMedis\PermintaanBarang;

use CodeIgniter\Database\BaseConnection;
use CodeIgniter\Database\BaseResult;

/**
 * Penanda permintaan yang sedang diajukan pembatalan atau pengembalian oleh unit, supaya terlihat
 * dari kolom status halaman daftar tanpa membuka detail. Status asli tetap tampil di detail & Monitoring.
 */
final class PengajuanUnitService
{
    public const string PEMBATALAN   = 'Pengajuan Pembatalan';
    public const string PENGEMBALIAN = 'Pengajuan Pengembalian';

    /** @var list<array{0: string, 1: string}> */
    public const array KETERANGAN = [
        [self::PEMBATALAN, 'menunggu keputusan pembatalan oleh Staf Gudang'],
        [self::PENGEMBALIAN, 'menunggu verifikasi pengembalian oleh Staf Gudang'],
    ];

    // pembatalan hanya bisa diputuskan saat Proses Permintaan / Menunggu Pengadaan; pengembalian saat Proses Pengembalian
    private const string SQL = '
        SELECT p.id_permintaan,
            CASE
                WHEN p.pengajuan_pembatalan IS TRUE AND p.id_status_permintaan_barang IN (4, 5) THEN ?
                WHEN EXISTS (SELECT 1 FROM inventori_non_medis.pengembalian_barang k
                             WHERE k.id_permintaan = p.id_permintaan AND k.id_status_pengembalian_barang = 2) THEN ?
            END AS label
        FROM inventori_non_medis.permintaan_barang p
        WHERE p.id_permintaan = ANY (?::int[])
    ';

    public function __construct(
        private BaseConnection $db,
    ) {}

    /**
     * Ganti kolom progress baris yang sedang diajukan pembatalan/pengembalian.
     *
     * @param array<array-key, mixed> $data_tabel
     * @throws \CodeIgniter\Database\Exceptions\DatabaseException
     */
    public function tandai(array &$data_tabel): void
    {
        $ids = [];
        foreach ($data_tabel as $row) {
            if (is_array($row)) {
                $ids[] = (int) ($row['id_permintaan'] ?? 0);
            }
        }
        $label = $this->label($ids);

        foreach ($data_tabel as $k => $row) {
            $id = is_array($row) ? (int) ($row['id_permintaan'] ?? 0) : 0;
            if (!is_array($row) || !array_key_exists($id, $label)) {
                continue;
            }
            $row['progress'] = $label[$id];
            $data_tabel[$k]  = $row;
        }
    }

    /**
     * @param list<int> $ids
     * @return array<int, string> id_permintaan => label badge
     * @throws \CodeIgniter\Database\Exceptions\DatabaseException
     */
    private function label(array $ids): array
    {
        $ids = array_filter($ids, static fn(int $id): bool => $id > 0);
        if ($ids === []) {
            return [];
        }

        $result = $this->db->query(self::SQL, [self::PEMBATALAN, self::PENGEMBALIAN, '{' . implode(',', $ids) . '}']);
        assert($result instanceof BaseResult, 'Query gagal dieksekusi.');

        $label = [];
        foreach ($result->getResultArray() as $r) {
            if (!is_string($r['label'] ?? null)) {
                continue;
            }
            $label[(int) $r['id_permintaan']] = $r['label'];
        }
        return $label;
    }
}
