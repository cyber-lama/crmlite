<?php

namespace App\Kernel;


use App\Exception\HttpNotFoundException;
use http\Exception;

class App
{
    public RouteComponent $routeComponent;
    public ViewComponent $view;
    public $db;

    public function __construct()
    {
        $this->view = new ViewComponent();
        $this->routeComponent = new RouteComponent($this);
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
