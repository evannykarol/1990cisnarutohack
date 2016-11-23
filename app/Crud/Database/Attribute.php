<?php

namespace App\Crud\Database;
use Illuminate\Support\Facades\Schema;

/**
 * class Attribute.
 *
 * @author Evanny Karol Hernandez Garcia <evannykarol1990@gmail.com>
 */
class Attribute
{
    /**
     * table name.
     *
     * @var string
     */
    private $table;

    /**
     * Result.
     *
     * @var[]
     */
    private $result = [];

    /**
     * create new attribute instance.
     *
     * @param $table
     */
    public function __construct($table)
    {
        $this->table = $table;
    }

    /**
     * Get attributes from an existing table.
     *
     * @return mixed
     */
    public function getAttributes()
    {
        $this->result = Schema::getColumnListing($this->table);
        unset($this->result[0]);
        return $this->result;
    }
}
