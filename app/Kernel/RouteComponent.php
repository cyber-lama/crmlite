<?php

namespace App\Kernel;

use App\Controllers\ArticleController;
use App\Controllers\Controller;
use Exception;
use HttpException;

class RouteComponent
{
    public $routes = [];
    public $uri;

    public function __construct()
    {
        $routes = include __DIR__ . "/../../routes/web.php";
        foreach ($routes as $uri => $route) {
            $this->add($uri, $route);
        }
        $this->uri = substr($_SERVER["REQUEST_URI"], 1);
    }

    public function run()
    {
        if (!isset($this->routes[$this->uri])) {
            throw new Exception("Страница не найдена");
        }
        /** @var Controller $controller */
        $controller = new $this->routes[$this->uri][0];
        $methodName = $this->routes[$this->uri][1];
        return $controller->$methodName();
    }

    public function add(string $uri, array $route)
    {
        if (count($route) !== 2) {
            throw new Exception("Роут должен содердать класс и название метода");
        }
        if (!(new $route[0]) instanceof Controller) {
            throw new Exception("Класс должен быть контроллером");
        }
        $this->routes[$uri] = $route;
    }

}
