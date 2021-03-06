<?php

namespace App\Crud\Database;

use Illuminate\Support\Facades\DB;

/**
 * class DefaultDatabase.
 *
 * @author Evanny Karol Hernandez Garcia <evannykarol1990@gmail.com>
 */
class MysqlDatabase extends Database
{
    public function tableNames()
    {
        return collect(DB::select($this->getQuery()))->pluck('Tables_in_'.env('DB_DATABASE'))->reject(function ($name) {
            return $this->skips()->contains($name);
        });
    }

    /**
     * mysql query.
     *
     * @return string
     */
    public function getQuery()
    {
        return 'SHOW TABLES';
    }

    /**
     * skip unused schemas.
     *
     * @return /Illuminate/Support/Collection
     */
    public function skipNames()
    {
        return collect([]);
    }
}
