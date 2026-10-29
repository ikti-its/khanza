<?php

declare(strict_types=1);

namespace App\Features\InventoriNonMedis;

/**
 * Halaman daftar transaksi: baris diurutkan otomatis per kelompok status (Draf - Proses - Selesai - Dibatalkan,
 * lalu terbaru di atas) dan dapat disaring rentang tanggal dokumen (?dari=&sampai=, format Y-m-d) serta
 * kelompok status lewat checkbox (?status[]=Proses&status[]=Selesai).
 * Kelompok status berupa kondisi SQL atas alias t (tabel utama); hasil urutan/filter diteruskan ke model
 * lewat primary key supaya tidak menimpa set_filter status yang sudah ada di halaman persetujuan.
 *
 * @require-extends \App\Core\Controller\ControllerTemplate
 */
trait DaftarTransaksi
{
    /**
     * @param array<string, string> $urutan_status label kelompok => kondisi SQL, sesuai urutan tampil
     * @throws \CodeIgniter\Database\Exceptions\DatabaseException
     */
    protected function atur_daftar(string $tabel, array $urutan_status = []): void
    {
        $dari   = $this->tanggal_get('dari');
        $sampai = $this->tanggal_get('sampai');
        $label  = array_keys($urutan_status);
        $pilih  = $this->status_get($label);

        $this->filter_tanggal = ['dari' => $dari, 'sampai' => $sampai, 'status_opsi' => $label, 'status' => $pilih];

        $pk    = $this->primary_key;
        $where = ["t.{$pk} > 0"];
        $binds = [];
        if ($dari !== '') {
            $where[] = 't.tanggal::date >= ?::date';
            $binds[] = $dari;
        }
        if ($sampai !== '') {
            $where[] = 't.tanggal::date <= ?::date';
            $binds[] = $sampai;
        }

        $kelompok = '';
        foreach (array_values($urutan_status) as $i => $kondisi) {
            $kelompok .= ' WHEN ' . $kondisi . ' THEN ' . ($i + 1);
        }
        $nomor = "CASE{$kelompok} ELSE 99 END";
        $order = $kelompok !== '' ? "{$nomor}, t.{$pk} DESC" : "t.{$pk} DESC";

        // satu baris masuk tepat satu kelompok (kondisi pertama yang cocok), sama dengan urutannya
        if ($pilih !== []) {
            $where[] =
                "{$nomor} IN ("
                . implode(', ', array_map(
                    static fn(string $l): int => (int) array_search($l, $label, true) + 1,
                    $pilih,
                ))
                . ')';
        }

        $result = $this->get_db()->query(
            "SELECT t.{$pk} AS id FROM inventori_non_medis.{$tabel} t WHERE "
            . implode(' AND ', $where)
            . " ORDER BY {$order}",
            $binds,
        );
        assert($result instanceof \CodeIgniter\Database\BaseResult, 'Query gagal dieksekusi.');
        $ids = array_values(array_map(fn(array $r): int => (int) $r['id'], $result->getResultArray()));

        if ($dari !== '' || $sampai !== '' || $pilih !== []) {
            $this->model->set_filter($pk, $ids === [] ? [-1] : $ids);
        }
        if ($ids !== []) {
            $this->model->set_order_ids($ids);
        }
    }

    // tanggal dari query string; selain format Y-m-d yang valid dianggap kosong
    private function tanggal_get(string $nama): string
    {
        $nilai = $this->request->getGet($nama);
        if (!is_string($nilai) || preg_match('/^(\d{4})-(\d{2})-(\d{2})$/', $nilai, $m) !== 1)
            return '';
        return checkdate((int) $m[2], (int) $m[3], (int) $m[1]) ? $nilai : '';
    }

    /**
     * Kelompok status yang dicentang (?status[]=...), hanya yang tersedia di halaman, sesuai urutan opsi.
     *
     * @param list<string> $opsi
     * @return list<string>
     */
    private function status_get(array $opsi): array
    {
        $nilai = $this->request->getGet('status');
        if (!is_array($nilai))
            return [];
        return array_values(array_filter($opsi, static fn(string $o): bool => in_array($o, $nilai, true)));
    }

    // urutan status permintaan: dipakai daftar permintaan & persetujuan permintaan
    /** @return array<string, string> */
    protected static function urutan_permintaan(): array
    {
        return [
            'Draf'               => 't.id_status_permintaan_barang = 1',
            'Proses'             => 't.id_status_permintaan_barang IN (2, 4, 5, 8)',
            'Selesai'            => 't.id_status_permintaan_barang = 6',
            'Ditolak/Dibatalkan' => 't.id_status_permintaan_barang IN (3, 7)',
        ];
    }

    // urutan status pengajuan: selesai bila semua qty disetujui sudah diterima gudang
    /** @return array<string, string> */
    protected static function urutan_pengajuan(): array
    {
        $disetujui = '(SELECT COALESCE(SUM(qty_disetujui), 0) FROM inventori_non_medis.pengajuan_barang_detail
            WHERE id_pengajuan = t.id_pengajuan AND id_barang > 0)';
        $diterima = '(SELECT COALESCE(SUM(d.qty_diterima), 0) FROM inventori_non_medis.penerimaan_barang_detail d
            JOIN inventori_non_medis.penerimaan_barang p ON d.id_penerimaan = p.id_penerimaan
            JOIN inventori_non_medis.pengadaan_barang g ON p.id_pengadaan = g.id_pengadaan
            WHERE g.id_pengajuan = t.id_pengajuan AND p.id_status_penerimaan_barang = 2 AND g.id_status_pengadaan_barang <> 3)';
        $pd_batal = '(EXISTS (SELECT 1 FROM inventori_non_medis.pengadaan_barang g WHERE g.id_pengajuan = t.id_pengajuan)
            AND NOT EXISTS (SELECT 1 FROM inventori_non_medis.pengadaan_barang g
                WHERE g.id_pengajuan = t.id_pengajuan AND g.id_status_pengadaan_barang <> 3))';

        return [
            'Draf'               => 't.id_status_pengajuan_barang = 1',
            'Proses'             => "(t.id_status_pengajuan_barang = 4 OR (t.id_status_pengajuan_barang = 2 AND NOT {$pd_batal}"
                . " AND NOT ({$disetujui} > 0 AND {$diterima} >= {$disetujui})))",
            'Selesai'            => "(t.id_status_pengajuan_barang = 2 AND {$disetujui} > 0 AND {$diterima} >= {$disetujui})",
            'Ditolak/Dibatalkan' => "(t.id_status_pengajuan_barang = 3 OR (t.id_status_pengajuan_barang = 2 AND {$pd_batal}))",
        ];
    }
}
