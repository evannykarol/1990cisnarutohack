<?php
namespace App\Crud;

/**
 * Class AppFunction.
 *
 * @author Evanny Karol Hernandez Garcia <evannykarol1990@gmail.com>
 */

use App\Crud\Generators\Generator;
class AppFunction
{
    /**
     * Generator instance.
     *
     * @var \App\Generators\Generator
     */
    public $generator;

    /**
     * Create new AppFunction instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->generator = app()->make('Generator');
    }

    /**
     * AppFunction Migration.
     *
     * @return \App\Crud\AppFunction
     */
    public function migration()
    {
        $this->generator->migration();

        return $this;
    }

    /**
     * AppFunction Model.
     *
     * @return \App\Crud\AppFunction
     */
    public function model()
    {
        $this->generator->model();

        return $this;
    }

    /**
     * Scaffold Views.
     *
     * @return \App\Crud\AppFunction
     */
    public function views()
    {
        $this->generator->dir();
        $this->generator->index();
        $this->generator->create();
        $this->generator->show();
        $this->generator->edit();
        $this->generator->modal();

        return $this;
    }

    /**
     * AppFunction Controller.
     *
     * @return \App\Crud\Scaffold
     */
    public function controller()
    {
        $this->generator->controller();

        return $this;
    }

    /**
     * AppFunction Route.
     *
     * @return \App\Crud\Scaffold
     */
    public function route()
    {
        $this->generator->route();

        return $this;
    }
}