<?php

namespace App\Controllers;

class ArticleController extends Controller
{
    public function test()
    {
        return $this->json([
            "firstName" => "Dmitriy",
            "lastname" => "Melnik"
        ], "Успешно") ;
    }
}
