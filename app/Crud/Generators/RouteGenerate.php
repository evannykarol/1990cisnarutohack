<?php

namespace App\Crud\Generators;

/**
 * Class RouteGenerate.
 *
 * @author Evanny Karol Hernandez Garcia <evannykarol1990@gmail.com>
 */
class RouteGenerate
{
    /**
     * The NamesGenerate instance.
     *
     * @var \Amranidev\ScaffoldInterface\Generators\NamesGenerate
     */
    private $names;

    /**
     * Create new RouteGenerate instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->names = app()->make('NamesGenerate');
    }

    /**
     * Compile route template.
     *
     * @return string
     */
    public function generate()
    {
        return "\n".view('scaffold-interface::template.routes', ['names' => $this->names])->render();
    }
}
