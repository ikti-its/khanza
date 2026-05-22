<?php

//AutoNomor untuk Nomor Rekam Medis (Saat ini dipake di masterpasien dan kelahiranbayi)
if (!function_exists('generateNextNoRM')) {
    /**
     * Generate nomor rekam medis berikutnya berdasarkan input terakhir.
     * Contoh: RM000137 → RM000138
     */
    function generateNextNoRM(?string $lastNo): string
    {
        /** @var list<bool> */
        $match = [];
        if (!$lastNo || !preg_match('/^RM(\d{6})$/', $lastNo, $match)) {
            return 'RM000001';
        }

        $lastNum = (int) $match[1];
        $nextNum = $lastNum + 1;

        return 'RM' . str_pad((string) $nextNum, 6, '0', STR_PAD_LEFT);
    }
}

//AutoNomor unuk No.SKL Kelahiran Bayi
if (!function_exists('generateNextSKL')) {
    /** Generate No. SKL dengan format: 0001/RM-SKL/07/2025 */
    function generateNextSKL(?string $lastSKL, string $tgl_lahir): string
    {
        $tanggal = strtotime($tgl_lahir);
        assert(is_int($tanggal));
        $bulan = date('m', $tanggal);
        $tahun = date('Y', $tanggal);

        /** @var list<bool> */
        $match = [];
        if (!$lastSKL || !preg_match('/^(\d{4})\/RM-SKL\/\d{2}\/\d{4}$/', $lastSKL, $match)) {
            $nomor = 1;
        } else {
            $nomor = (int) $match[1] + 1;
        }

        $nomorStr = str_pad((string) $nomor, 4, '0', STR_PAD_LEFT);
        return "{$nomorStr}/RM-SKL/{$bulan}/{$tahun}";
    }
}
