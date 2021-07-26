<?php

namespace App\Kernel;

use App\Controllers\Controller;
use App\Exception\HttpNotFoundException;
use App\Exception\HttpServerException;
use Exception;

class RouteComponent
{
    public $routes = [];
    public $uri;

    /**
     * @throws Exception
     */
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
            throw new HttpNotFoundException("Страница не найдена");
        }
        /** @var Controller $controller */
        $controller = new $this->routes[$this->uri][0];
        $methodName = $this->routes[$this->uri][1];
        return $controller->$methodName();
    }

    /**
     * @throws Exception
     */
    public function add(string $uri, array $route)
    {
        $initClass = new $route[0];
        if (count($route) !== 2) {
            throw new Exception("Роут должен содердать класс и название метода", 500);
        }
        if (!($initClass) instanceof Controller) {
            throw new Exception("Класс должен быть контроллером");
        }
        if (!method_exists($initClass, $route[1])){
            throw new Exception("У класса [{$route[0]}] нет метода с именем " . $route[1]);
        }

        $this->routes[$uri] = $route;
    }

    public function notFoundPage()
    {
        return include __DIR__ . '/../../public/notFound.php';
    }

}
