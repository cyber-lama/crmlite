<?php

namespace App\Kernel;


use App\Exception\HttpNotFoundException;
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
        try {
            return $this->routeComponent->run();
        } catch (HttpNotFoundException $e) {
            return $this->routeComponent->notFoundPage();
        }
    }
}
