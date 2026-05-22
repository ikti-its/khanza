<?php

namespace App\Services;
use App\Core\Controller\CURL;

class NomorGeneratorService
{
    protected string $api_url;
    protected string $token;

    public function __construct()
    {
        $this->api_url = getenv('api_URL') ?: 'api_URL env is incorrect';
        $session = session()->has('jwt_token');
        $token = '';
        if($session)
            /** @var string */
            $token = session()->get('jwt_token');
        $this->token = $token;
    }

    public function getLastNoRM(): ?string
    {
        $url = $this->api_url . "/masterpasien?limit=1&sort=desc";
        /** @var array{'data':list<array{'no_rkm_medis':string}>} */
        $response = CURL::call('GET', $url);
        return $response['data'][0]['no_rkm_medis'] ?? null;
    }

    public function getLastSKL(string $bulan, string $tahun): ?string
    {
        $url = $this->api_url . "/kelahiranbayi?bulan=$bulan&tahun=$tahun";
        /** @var array{'data':list} */
        $response = CURL::call('GET', $url);

        if (empty($response['data'])) return null;

        // Urutkan manual berdasarkan nomor urut SKL
        /** @var list<array{no_skl: string}> $data */
        $data = $response['data'];

        
        /** @param array{'no_skl': string} $a 
         * @param array{'no_skl': string} $b
        */
        usort($data, function (array $a, array $b) {
            // Ambil bagian nomor urut SKL (misal 0003 dari 0003/RM-SKL/07/2025)
            /** @var list<bool> */
            $matchA = [];
            /** @var list<bool> */
            $matchB = [];
            preg_match('/^(\d{4})/', $a['no_skl'], $matchA);
            preg_match('/^(\d{4})/', $b['no_skl'], $matchB);

            return (int)($matchB[1] ?? 0) <=> (int)($matchA[1] ?? 0); // descending
        });

        return $data[0]['no_skl'] ?? null;
    }
}
