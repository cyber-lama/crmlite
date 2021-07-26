<?php

namespace App\Controllers;

use App\Resources\Resource;
use App\Resources\UserResource;

class ArticleController extends Controller
{
    public function test(): string
    {
        $collection = [
            [
                "firstname" => "john",
                "lastname" => "petrov"
            ],
            [
                "firstname" => "petr",
                "lastname" => "vasya"
            ],
            [
                "firstname" => "petr3",
                "lastname" => "vasya3"
            ],
            [
                "firstname" => "petr4",
                "lastname" => "vasya4"
            ]
        ];
        $object = [
            "firstname" => "john",
            "lastname" => "petrov"
        ];


        return $this->json([
            "collection" => UserResource::collection($collection),
            "user" => UserResource::make($object)
        ]);
//        return $this->json(Resource::make($object));
    }
}
