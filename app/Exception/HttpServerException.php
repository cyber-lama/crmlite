<?php

namespace App\Exception;

use Throwable;

class HttpServerException extends \Exception{
    public function __construct($message = "", $code = 500, Throwable $previous = null)
    {
        header("HTTP/1.1 500 Internal Server Error");
        include __DIR__ . '/../../public/severError.php';
        parent::__construct($message, $code, $previous);
    }
}
