<?php

namespace App\Kernel;

class App
{
    public $routeComponent;
    public $db;

    public function __construct()
    {
        $this->routeComponent = new RouteComponent();
    }

    public function run(): string
    {
        return $this->routeComponent->run();
    }
}
