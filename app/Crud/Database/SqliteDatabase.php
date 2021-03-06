<?php

namespace App\Crud\Database;

/**
 * class SqliteDatabase.
 *
 * @author Evanny Karol Hernandez Garcia <evannykarol1990@gmail.com>
 */
class SqliteDatabase extends Database
{
    /**
     * sqlite query.
     *
     * @return string
     */
    public function getQuery()
    {
        return "SELECT name FROM sqlite_master WHERE type='table'";
    }

    /**
     * skip unused schemas.
     *
     * @return /Illuminate/Support/Collection
     */
    public function skipNames()
    {
        return collect([
            'sqlite_sequence',
        ]);
    }
}
