<?php
declare(strict_types=1);

namespace App\Core;
use CodeIgniter\Database\RawSql;

final class DBType
{
    public function __construct(
        private array $definition
    ) {
        // Force NOT NULL unless explicitly overridden
        $this->definition['null'] ??= false;
    }

    public function definition(): array
    {
        return $this->definition;
    }

    public function nullable(): self
    {
        return new self([
            ...$this->definition,
            'null' => true,
        ]);
    }

    public function default(mixed $value): self
    {
        return new self([
            ...$this->definition,
            'default' => $value,
        ]);
    }

    public function defaultRaw(string $sql): self
    {
        return new self([
            ...$this->definition,
            'default' => new RawSql($sql),
        ]);
    }

    public function check(string $expr): self
    {
        return new self([
            ...$this->definition,
            'check' => $expr,
        ]);
    }
    
    public static function UUID(): self {
        return new self([
            'type' => 'UUID',
            'default' => new RawSql('gen_random_uuid()'),
        ]);
    }

    public static function ID8() : self { return new self(['type' => 'SMALLINT', 'auto_increment' => true]);}
    public static function ID16(): self { return new self(['type' => 'SMALLINT', 'auto_increment' => true]);}
    public static function ID24(): self { return new self(['type' => 'INTEGER', 'auto_increment' => true]);}
    public static function ID32(): self { return new self(['type' => 'INTEGER', 'auto_increment' => true]);}
    public static function ID64(): self { return new self(['type' => 'BIGINT', 'auto_increment' => true]);}

    public static function INT8() : self { return new self(['type' => 'SMALLINT']);}
    public static function INT16(): self { return new self(['type' => 'SMALLINT']);}
    public static function INT24(): self { return new self(['type' => 'INTEGER']);}
    public static function INT32(): self { return new self(['type' => 'INTEGER']);}
    public static function INT64(): self { return new self(['type' => 'BIGINT']);}

    public static function F32(): self { return new self(['type' => 'REAL']);}
    public static function F64(): self { return new self(['type' => 'DOUBLE PRECISION']);}
    public static function TEXT(): self { return new self(['type' => 'TEXT']);}
    public static function BOOL(): self { return new self(['type' => 'BOOLEAN']);}

    public static function DATE(): self { return new self(['type' => 'DATE']);}
    public static function TIME(): self { return new self(['type' => 'TIME']);}
    public static function DATETIME(): self { return new self(['type' => 'TIMESTAMPTZ']);}

    public static function IPV4(): self { return new self(['type' => 'INET','check' => 'family(VALUE) = 4']);}
    public static function IPV6() : self { return new self(['type' => 'INET','check' => 'family(VALUE) = 6']);}
    public static function NETV4(): self { return new self(['type' => 'CIDR','check' => 'family(VALUE) = 4']);}
    public static function NETV6(): self { return new self(['type' => 'CIDR','check' => 'family(VALUE) = 6']);}
    public static function MAC48(): self { return new self(['type' => 'MACADDR']);}
    public static function MAC64(): self { return new self(['type' => 'MACADDR8']);}
}

