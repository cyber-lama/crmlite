<?php

namespace App\Controllers;

use App\Kernel\App;

class Controller
{
    protected $app;

    public function __construct(App $app)
    {
        $this->app = $app;
    }

    public function json(array $data = [], string $message = "")
    {
        header('Content-Type: application/json');
        return json_encode([
            "data" => $data,
            "message" => $message
        ]);
    }
}
