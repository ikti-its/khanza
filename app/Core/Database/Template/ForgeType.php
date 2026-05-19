<?php
declare(strict_types=1);

namespace App\Core\Database\Template;

use CodeIgniter\Database\RawSql;

final readonly class ForgeType
{
    public function __construct(
        private string $type,
        private ?string $constraint = null,
        private ?string $check   = null,
        private bool    $null    = false,
        private ?RawSql $default = null,
    ) {}

    /**
     * @return array{
     *     type: string,
     *     null: bool,
     *     constraint?: int,
     *     default?: RawSql,
     * }
     */
    public function definition(): array { 
        $arr = [
            'type' => $this->type,
            'null' => $this->null,
        ];
        if($this->check      !== null) $arr['type'] .= " CHECK ( $this->check )";
        if($this->default    !== null) $arr['default']    = $this->default;
        if($this->constraint !== null) $arr['constraint'] = $this->constraint;
        return $arr;
    }

    public function nullable(): self {
        return new self(
            type:       $this->type,
            constraint: $this->constraint,
            check:      $this->check,
            null:       true,
            default:    $this->default,
        );
    }
}
