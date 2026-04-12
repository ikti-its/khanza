<?php
declare(strict_types=1);

namespace App\Core;

final readonly class Assert
{
    public static function Unreachable(string $message = 'This code should be unreachable'): never
    {
        die($message);
    }
}