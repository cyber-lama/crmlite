<?php

namespace App\Exception;

use Throwable;

class HttpNotFoundException extends \Exception
{
    public function __construct($message = "", $code = 404, Throwable $previous = null)
    {
        header("HTTP/1.1 404 Not Found");
        include __DIR__ . '/../../public/notFound.php';
        parent::__construct($message, $code, $previous);
    }
}
