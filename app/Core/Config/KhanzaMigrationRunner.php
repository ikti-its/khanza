<?php
declare(strict_types=1);

namespace App\Core\Config;
use App\Core\Database\Template\DatabaseTemplate;
use App\Core\Database\Template\Migration;
use CodeIgniter\Database\MigrationRunner;
use App\Core\Controller\Assert;

final class KhanzaMigrationRunner extends MigrationRunner
{
    /** @var string */
    protected $regex = '/\A(\w+Database)\z/';
    
    /** @var array<class-string<DatabaseTemplate>, DatabaseTemplate> */
    private static array $ref_class_cache = [];

    /** @param array<class-string<DatabaseTemplate>, Migration> $ref_table_classes 
     * @return array<class-string<DatabaseTemplate>, list<class-string<DatabaseTemplate>>> 
    */
    private static function buildGraph(array $ref_table_classes): array
    {
        $graph = [];
        $classes = [];
        foreach ($ref_table_classes as $ref_table_class)
            $classes[] = $ref_table_class->class;

        $all = [];
        foreach ($classes as $class)
            $all[$class] = true;

        foreach ($classes as $class) {
            $ref_table = self::$ref_class_cache[$class] ??= new $class();
            $deps = $ref_table->dependencies();
            foreach ($deps as $dep) {
                Assert::True(isset($all[$dep]),
                    "Migration dependency not found: $dep -> $class");
            }
            $graph[$class] = $deps;
        }

        return $graph;
    }

    /**
     * @param array<class-string<DatabaseTemplate>, list<class-string<DatabaseTemplate>>> $graph
     * @return list<class-string<DatabaseTemplate>>
     */
    private static function topoSort(array $graph): array
    {
        /** @var array<class-string<DatabaseTemplate>, bool> $visited */
        $visited = [];

        /** @var array<class-string<DatabaseTemplate>, bool> $visiting */
        $visiting = [];

        /** @var list<class-string<DatabaseTemplate>> $result */
        $result = [];

        foreach (array_keys($graph) as $node) {
            self::visitNode(
                $node,
                $graph,
                $visited,
                $visiting,
                $result
            );
        }

        return $result;
    }

    /**
     * @param class-string<DatabaseTemplate> $node
     * @param array<class-string<DatabaseTemplate>, list<class-string<DatabaseTemplate>>> $graph
     * @param array<class-string<DatabaseTemplate>, bool> $visited
     * @param array<class-string<DatabaseTemplate>, bool> $visiting
     * @param  list<class-string<DatabaseTemplate>> $result
     */
    private static function visitNode(
        string $node,
        array $graph,
        array &$visited,
        array &$visiting,
        array &$result
    ): void {
        if (isset($visited[$node])) return;

        if (isset($visiting[$node]))
            die( "Circular dependency detected at $node");

        $visiting[$node] = true;

        // Recurse through dependencies
        foreach ($graph[$node] as $dep) {
            self::visitNode(
                $dep,
                $graph,
                $visited,
                $visiting,
                $result
            );
        }

        unset($visiting[$node]);
        $visited[$node] = true;
        $result[] = $node;
    }

    /**
     * @param list<class-string<DatabaseTemplate>> $ordered
     * @return array<class-string<DatabaseTemplate>, string>
     */
    private static function assignVersions(array $ordered): array
    {
        $versions = [];
        for($i = 0; $i < count($ordered); $i++) {
            $class = $ordered[$i];
            $versions[$class] = str_pad((string)($i+1), 14, '0', STR_PAD_LEFT);
        }

        return $versions;
    }

    #[\Override]
    public function findMigrations(): array
    {
        /** @var array<class-string<DatabaseTemplate>, object{
         *     version:string,
         *     name:string,
         *     path:string,
         *     class:string,
         *     namespace:string,
         *     uid:string
         * }> $ci_migrations */
        $ci_migrations = parent::findMigrations();

        $migrations = [];
        foreach ($ci_migrations as $key => $m){
            $migration = new Migration(
                $m->version,
                $m->name,
                $m->path,
                $m->class,
                $m->namespace,
                $m->uid,
            );
            $migrations[$key] = $migration;
        }
    
        unset($migrations[\App\Core\Database\Special\InitDatabase::class]);
        unset($migrations[\App\Core\Database\Special\SearchPathDatabase::class]);
        unset($migrations[\App\Core\Database\Special\EncryptDatabase::class]);
        unset($migrations[\App\Core\Database\Special\AuditDatabase::class]);
        $graph    = self::buildGraph($migrations);
        $ordered  = self::topoSort($graph);

        /**
         * @var list<class-string<DatabaseTemplate>> $ordered
         */
        $ordered = [
            \App\Core\Database\Special\InitDatabase::class,
            ...$ordered,
            \App\Core\Database\Special\SearchPathDatabase::class,
            \App\Core\Database\Special\EncryptDatabase::class,
            \App\Core\Database\Special\AuditDatabase::class,
        ];
        $versions = self::assignVersions($ordered);

        $result = [];

        foreach ($ordered as $class) {
            $migration = $ci_migrations[$class];
            $migration->version = $versions[$class];
            $result[$versions[$class]] = $migration;
        }
        
        return $result;
    }

    #[\Override()]
    protected function getMigrationName(string $migration): string
    {
        $matches = [];
        preg_match($this->regex, $migration, $matches);
        return $matches !== [] ? $matches[1] : '';
    }
}
