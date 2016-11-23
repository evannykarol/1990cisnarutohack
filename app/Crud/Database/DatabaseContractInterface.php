<?php

namespace App\Crud\Database;

/**
 * interface DatabaseContract.
 *
 * @author Evanny Karol Hernandez Garcia <evannykarol1990@gmail.com>
 */
interface DatabaseContractInterface
{
    /**
     * retrieve table names from database.
     *
     * @return /Illuminate/Support/Collection
     */
    public function tableNames();
}
