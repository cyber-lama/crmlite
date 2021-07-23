<?php

namespace App\Kernel;


use http\Exception;

class App
{
    public RouteComponent $routeComponent;
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
