<?php
declare(strict_types=1);

namespace App\Core\Database;

final class TypeHelper
{
    public static function is_array_of_strings(mixed $value): bool {
        if(!is_array($value))
            return false;
        foreach ($value as $item) {
            if(!is_string($item))
                return false;
        }
        return true;
    }

    public static function is_array_of_array_of_strings(mixed $value): bool {
        if(!is_array($value))
            return false;
        foreach ($value as $item) {
            if(!self::is_array_of_strings($item))
                return false;
        }
        return true;
    }

    public static function convert_string_to_array_of_string(mixed $value): array {
        if(is_string($value))
            return [$value];
        return $value;
    }

    public static function convert_string_or_array_to_array_of_array_of_string(mixed $value): array {
        if(is_string($value))
            return [[$value]];
        if(self::is_array_of_strings($value))
            return [$value];
        return $value;
    }
}