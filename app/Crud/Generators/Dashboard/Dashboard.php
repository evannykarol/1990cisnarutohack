<?php

namespace App\Crud\Generators\Dashboard;

use App\Crud\Filesystem\Filesystem;

class Dashboard extends Filesystem
{
    /**
     * Parser.
     *
     * @var \Amranidev\ScaffoldInterface
     */
    private $parse;

    /**
     * Create new HomePageGenerator instance.
     *
     * @param string $parse
     */
    public function __construct($parse)
    {
        $this->parse = $parse;
    }

    /**
     * Generate HomePage.
     */
    private function generate()
    {
        return view('scaffold-interface::template.HomePage.HomePage', ['Parse' => $this->parse])->render();
    }

    /**
     * Save HomePage.
     */
    public function burn()
    {
        $this->make(base_path().'/resources/views/HomePageScaffold.blade.php', $this->generate());
    }
}
