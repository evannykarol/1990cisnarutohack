<?php

namespace App\Crud\Datasystem;

use Illuminate\Support\Facades\Schema;

/**
 * Class     DataSystem.
 *
 *
 * @author Evanny Karol Hernandez Garcia <evannykarol1990@gmail.com>
 */
class Datasystem
{
    /**
     * Main interface reqeust.
     *
     * @var
     */
    private $data;

    /**
     * on data specification.
     *
     * @var
     */
    private $onData;

    /**
     * ForrignKeys and relations.
     *
     * @var
     */
    private $foreignKeys;

    /**
     * Relational Columns.
     *
     * @var
     */
    private $relationAttributes;

    /**
     * Create DataSystem instance.
     *
     * @param array $request
     */
    public function __construct($request)
    {
        // unset TableName
        unset($request['TableName']);

        // unset template
        unset($request['template']);

        $this->data = $request;

        $this->relationData();

        $this->getAttributes();
    }

    /**
     * deduce relational arttributes.
     *
     * @return void
     */
    private function getAttributes()
    {
        collect($this->foreignKeys)->each(function ($key, $value) {
            $Schema = collect(Schema::getColumnListing($key));
            $Schema = $Schema->reject(function ($value, $key) {
                return str_contains($value, 'id');
            });
            $this->relationAttributes[$key] = $Schema->toArray();
        });
    }

    /**
     * deduce onData and foreingKeys.
     *
     * @return void
     */
    private function relationData()
    {
        $onData = collect($this->data)->reject(function ($value, $key) {
            return !str_contains($key, 'on');
        });

        $foreignKeys = collect($this->data)->reject(function ($value, $key) {
            return !str_contains($key, 'tbl');
        });

        $this->onData = array_values($onData->toArray());

        $this->foreignKeys = array_values($foreignKeys->toArray());
    }

    /**
     * Data for migration and views.
     *
     * @param string specification
     *
     * @return array
     */
    public function dataData($spec = null)
    {
        $data = collect($this->data)->reject(function ($value, $key) use ($spec) {
            return !str_contains($key, 'items');
        });
        return array_values($data->toArray());
    }
    /**
     * Get foreignKeys.
     *
     * @return string
     */
    public function isNullable($is)
    {
        if ($is=='optional') {
            return '->nullable()';
        } elseif ($is == 'required|unique'){
            return '->unique()';
        } else {
            return null;
        }               
    }

    /**
     * Get foreignKeys.
     *
     * @return string
     */
    public function getForeignKeys()
    {
        return $this->foreignKeys;
    }

    /**
     * Get relational attributes.
     *
     * @return string
     */
    public function getRelationAttributes()
    {
        return $this->relationAttributes;
    }

    /**
     * Check timestamps.
     *
     * @return bool
     */
    public function isTimestamps()
    {
        return array_key_exists('timestamps', $this->data) ? true : false;
    }

    /**
     * Check SoftDeletes.
     *
     * @return bool
     */
    public function isSoftdeletes()
    {
        return array_key_exists('softdeletes', $this->data) ? true : false;
    }

    /**
     * Get onData.
     *
     * @return string
     */
    public function getOnData()
    {
        return $this->onData;
    }

     /**
      * get request data.
      *
      * @return string
      */
     public function getData()
     {
         return $this->data;
     }
     public function Migrate($data){
        // $scope.select = ['String', 'date', 'longText', 'integer', 'biginteger', 'boolean', 'float'];
        if($data=='date'){
            return 'date';
        }else if($data=='datetime'){
            return 'datetime';
        }else if($data=='textarea'){
            return 'longText';
        }else if($data=='relationship'){
            return 'relationship';
        }
        else{
            return 'string';
        }
     }
}
