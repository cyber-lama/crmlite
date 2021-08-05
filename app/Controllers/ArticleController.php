<?php

namespace App\Controllers;

use App\Resources\ArticleResource;
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
        $acticle = [
            "title" => "title Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum, quidem!",
            "body" => "body Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores, natus, vero. Blanditiis nostrum perferendis sit? Ab adipisci architecto consectetur culpa cumque dicta eaque fuga, fugiat maiores obcaecati quas quibusdam repellendus reprehenderit repudiandae totam. Ad alias aliquam at atque aut blanditiis debitis doloremque ducimus eligendi esse eum fuga fugiat harum libero magnam nam, natus neque nihil nulla omnis optio perspiciatis praesentium quae repudiandae totam unde, ut veritatis vitae voluptatem voluptatibus. A ad, adipisci aspernatur, autem debitis dicta dolore dolores, eveniet ex ipsam iste natus neque possimus quo quos rem sapiente. Aliquid aperiam facilis iste magnam nam perferendis reiciendis rem repudiandae sunt tempore! Ab assumenda at eius est expedita id laborum maiores obcaecati omnis, pariatur perferendis quae qui quidem quisquam sequi sint sunt voluptas voluptatum? Assumenda at aut blanditiis cum excepturi facilis iure, labore officia praesentium quasi sequi tenetur ullam! Aut consequuntur culpa ea earum ex facilis, impedit iusto nemo non quisquam sint ullam. Assumenda error esse nostrum obcaecati ullam! Ad aliquam amet aperiam architecto at atque beatae consectetur corporis culpa dignissimos expedita fuga inventore iure, modi molestiae necessitatibus nisi nostrum nulla officia omnis placeat provident qui quibusdam, rerum saepe tempora, ullam voluptatibus. Deserunt ducimus eum ex odio odit repellat ullam voluptatem.",
            "author" => "autor Lorem ipsum dolor."
        ];
        return $this->app->view->render(ArticleResource::make($acticle), "index");
        return $this->json([
            "collection" => UserResource::collection($collection),
            "user" => UserResource::make($object)
        ]);
//        return $this->json(Resource::make($object));
    }
}
