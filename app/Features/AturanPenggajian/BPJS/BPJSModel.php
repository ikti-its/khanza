<?php
declare(strict_types=1);

namespace App\Features\AturanPenggajian\BPJS;
use App\Core\Model\ModelTemplate;

final class BPJSModel extends ModelTemplate
{
    public function __construct(){
        parent::__construct(
            'BASE',
            'penggajian',
            'bpjs',
            'no_bpjs',
            [
                'no_bpjs' => [
                    'allowed' => false,
                    'rules'   => '',
                    'errors'  => [],
                ], 
                'nama_program' => [
                    'allowed' => true,
                    'rules'   => '',
                    'errors'  => [],
                ], 
                'penyelenggara' => [
                    'allowed' => true,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'tarif' => [
                    'allowed' => true,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'batas_atas' => [
                    'allowed' => true,
                    'rules'   => '',
                    'errors'  => [],
                ],
                'batas_bawah' => [
                    'allowed' => true,
                    'rules'   => '',
                    'errors'  => [],
                ]
            ],
        );
    }
}