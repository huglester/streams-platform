<?php namespace Anomaly\Streams\Platform\Database\Migration;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Migrations\DatabaseMigrationRepository;

class MigrationRepository extends DatabaseMigrationRepository
{

    /**
     * Find many migrations by an addon namespace.
     *
     * @param                   $namespace
     * @param  string           $order
     * @return array|Collection
     */
    public function findManyByNamespace($namespace, $order = 'desc')
    {
        return $this
            ->table()
            ->where('migration', 'like', "%_{$namespace}_%")
            ->orderBy('migration', $order)
            ->get();
    }

    /**
     * Find many migrations by an addon namespace.
     *
     * @param  array            $files
     * @param  string           $order
     * @return array|Collection
     */
    public function findManyByFiles(array $files, $order = 'desc')
    {
        return $this
            ->table()
            ->whereIn('migration', $files)
            ->orderBy('migration', $order)
            ->get();
    }
}
