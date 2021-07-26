<?php

namespace App\Resources;

class UserResource extends Resource
{
    public function toArray()
    {
        return [
            "name" => $this->firstname . " " . $this->lastname
        ];
    }
}
