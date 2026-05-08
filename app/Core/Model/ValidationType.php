<?php
declare(strict_types=1);

namespace App\Core\Model;
use App\Core\Controller\Assert;
use CodeIgniter\Database\RawSql;

final class ValidationType
{
    public function __construct(
        private string $rules,
        private string $error,
    ) {}

    public static function TODO(): self {
        return new self('TODO','TODO : This field need a proper validation');
    }

    public static function DEFAULT(): self {
        return new self('DEFAULT', 'DEFAULT');
    }
}