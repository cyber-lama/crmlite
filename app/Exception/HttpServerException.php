<?php

namespace App\Exception;

use Throwable;

class HttpServerException extends \Exception{
    public function __construct($message = "", $code = 500, Throwable $previous = null)
    {
        header("HTTP/1.1 404 Internal Server Error");
        parent::__construct($message, $code, $previous);
    }
}
