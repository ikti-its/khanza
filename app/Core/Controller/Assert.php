<?php
declare(strict_types=1);

namespace App\Core\Controller;

final readonly class Assert
{
    public static function Unreachable(string $message = 'This code should be unreachable'): never
    {
        die($message);
    }

    public static function True(bool $condition, string $message){
        if($condition === false)
            die($message);
        return;
    }

    public static function False(bool $condition, string $message){
        if($condition === true)
            die($message);
        return;
    }
}