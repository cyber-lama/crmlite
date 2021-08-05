<?php

namespace App\Resources;

class ArticleResource extends Resource
{
    public function toArray()
    {
        return [
            "title" => $this->title,
            "body" => $this->body,
            "author" => $this->author
        ];
    }
}
