<?php

namespace App\Controllers;

class Controller
{
    public function json(array $data = [], string $message = "")
    {
        header('Content-Type: application/json');
        return json_encode([
            "data" => $data,
            "message" => $message
        ]);
    }
}
