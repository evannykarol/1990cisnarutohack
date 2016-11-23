<?php

namespace App\Crud\Filesystem;

/**
 * Class Paths.
 *
 * @author Evanny Karol Hernandez Garcia <evannykarol1990@gmail.com>
 */
class Path
{
    /**
     * The NamesGenerate instance.
     *
     * @var \Amranidev\ScaffoldInterface\Generators\NamesGenerate
     */
    private $names;

    /**
     * Migration file path.
     *
     * @var string
     */
    public $migrationPath;

    /**
     * Create new Paths instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->names = app()->make('NamesGenerate');

        $this->migrationPath = $this->MigrationPath();
    }

    /**
     * Get model file path.
     *
     * @return string
     */
    public function modelPath()
    {
        return config('crud.config.model').'/'.$this->names->TableName().'.php';
    }

    /**
     * Get migration file path.
     *
     * @return string
     */
    private function migrationPath()
    {
        $FileName = date('Y').'_'.date('m').'_'.date('d').'_'.date('his').'_'.$this->names->TableNames().'.php';

        return config('crud.config.migration').'/'.$FileName;
    }

    /**
     * Get controller file path.
     *
     * @return string
     */
    public function controllerPath()
    {
        $FileName = $this->names->TableName().'Controller.php';

        return config('crud.config.controller').'/'.$FileName;
    }

    /**
     * Get index file path.
     *
     * @return string
     */
    public function indexPath()
    {
        return config('crud.config.views').'/'.$this->names->TableNameSingle().'/'.'index.blade.php';
    }

    /**
     * Get create file path.
     *
     * @return string
     */
    public function createPath()
    {
        return config('crud.config.views').'/'.$this->names->TableNameSingle().'/'.'create.blade.php';
    }

    /**
     * Get show file path.
     *
     * @return string
     */
    public function showPath()
    {
        return config('crud.config.views').'/'.$this->names->TableNameSingle().'/'.'show.blade.php';
    }

    /**
     * Get edit file path.
     *
     * @return string
     */
    public function editPath()
    {
        return config('crud.config.views').'/'.$this->names->TableNameSingle().'/'.'edit.blade.php';
    }
    /**
     * Get edit file path.
     *
     * @return string
     */
    public function modalPath()
    {
        return config('crud.config.views').'/'.$this->names->TableNameSingle().'/'.'modal.blade.php';
    }    

    /**
     * Get route file path.
     *
     * @return string
     */
    public function routePath()
    {
        return config('crud.config.routes');
    }

    /**
     * Get views directory path.
     *
     * @return string
     */
    public function dirPath()
    {
        return config('crud.config.views').'/'.$this->names->TableNameSingle();
    }
}
