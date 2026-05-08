<?php
declare(strict_types=1);

namespace App\Core\Database;
use App\Core\Controller\Assert;
use CodeIgniter\Database\RawSql;

final class DatabaseType
{
    public function __construct(
        private array $definition
    ) {
        // Force NOT NULL unless explicitly overridden
        $this->definition['null'] ??= false;
    }

    public function definition(): array { 
        return $this->definition;}

    public function nullable(): self {
        return new self([...$this->definition,'null' => true]);}

    public function default(mixed $value): self { 
        return new self([...$this->definition,'default' => $value]);}

    public function defaultRaw(string $sql): self {
        return new self([...$this->definition,
            'default' => new RawSql($sql)]);}

    public function check(string $expr): self {
        return new self([...$this->definition,'check' => $expr]);}
    
    public static function UUID(): self {
        return new self(['type' => 'UUID', 
            'default' => new RawSql('gen_random_uuid()')]);}

    public static function FK_AUTO() : self { 
        return new self(['type' => 'FK_AUTO']);}

    public static function ID8(int $max) : self { 
        Assert::True($max > 0,
        "Maximum value $max cannot be negative");
        Assert::True($max < (1 << 31), 
        "Maximum value $max higher than 2^31, please use ID64");
        Assert::True($max < (1 << 15), 
        "Maximum value $max higher than 2^15, please use ID32");
        Assert::True($max < (1 << 7), 
        "Maximum value $max higher than 2^7, please use ID16");

        return new self(['type' => 'SMALLINT', 'auto_increment' => true]);
    }
    public static function ID16(int $max): self {
        Assert::True($max > 0,
        "Maximum value $max cannot be negative");
        Assert::True($max < (1 << 31), 
        "Maximum value $max higher than 2^31, please use ID64");
        Assert::True($max < (1 << 15), 
        "Maximum value $max higher than 2^15, please use ID32");
         Assert::True($max > (1 << 7), 
        "Maximum value $max lower than 2^7, please use ID8");

        return new self(['type' => 'SMALLINT', 'auto_increment' => true]);
    }
    public static function ID32(int $max): self {
        Assert::True($max > 0,
        "Maximum value $max cannot be negative");
        Assert::True($max < (1 << 31), 
        "Maximum value $max higher than 2^31, please use ID64");
        Assert::True($max > (1 << 7), 
        "Maximum value $max lower than 2^7, please use ID8");
        Assert::True($max > (1 << 15), 
        "Maximum value $max lower than 2^15, please use ID16");
        
        return new self(['type' => 'INTEGER', 'auto_increment' => true]);
    }
    public static function ID64(int $max): self {
        Assert::True($max > 0,
        "Maximum value $max cannot be negative"); 
        Assert::True($max > (1 << 7), 
        "Maximum value $max lower than 2^7, please use ID8");
        Assert::True($max > (1 << 15), 
        "Maximum value $max lower than 2^15, please use ID16");
        Assert::True($max > (1 << 31), 
        "Maximum value $max lower than 2^31, please use ID32");

        return new self(['type' => 'BIGINT', 'auto_increment' => true]);
    }

    
    public static function INT8() : self { 
        return new self(['type' => 'SMALLINT']);}
    public static function INT16(): self { 
        return new self(['type' => 'SMALLINT']);}
    public static function INT32(): self { 
        return new self(['type' => 'INTEGER']);}
    public static function INT64(): self { 
        return new self(['type' => 'BIGINT']);}

    public static function F32(): self { 
        return new self(['type' => 'REAL']);}
    public static function F64(): self { 
        return new self(['type' => 'DOUBLE PRECISION']);}
    public static function TEXT(): self { 
        return new self(['type' => 'TEXT']);}
    public static function BOOL(): self { 
        return new self(['type' => 'BOOLEAN']);}

    public static function DATE(): self { 
        return new self(['type' => 'DATE']);}
    public static function TIME(): self { 
        return new self(['type' => 'TIME']);}
    public static function DATETIME(): self { 
        return new self(['type' => 'TIMESTAMPTZ']);}
    public static function YEAR(): self { 
        return new self(['type' => 'SMALLINT',
            'check' => 'VALUE >= 1900 AND VALUE <= 2100']);}

    public static function IPV4(): self { 
        return new self(['type' => 'INET','check' => 'family(VALUE) = 4']);}
    public static function IPV6() : self { 
        return new self(['type' => 'INET','check' => 'family(VALUE) = 6']);}
    public static function NETV4(): self { 
        return new self(['type' => 'CIDR','check' => 'family(VALUE) = 4']);}
    public static function NETV6(): self { 
        return new self(['type' => 'CIDR','check' => 'family(VALUE) = 6']);}
    public static function MAC48(): self { 
        return new self(['type' => 'MACADDR']);}
    public static function MAC64(): self { 
        return new self(['type' => 'MACADDR8']);}

    public static function MONEY(): self {
        return self::INT64();
    }

    public static function NAME(): self {
        return self::TEXT();
    }

    public static function TEMP(): self {
        return self::INT8();
    }

    public static function PERCENT(): self {
        return self::F32();
    }

}
