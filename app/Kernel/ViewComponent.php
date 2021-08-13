<?php

namespace App\Kernel;

class ViewComponent
{
    public $path;

    public function __construct()
    {
        $this->path = __DIR__ . "/../../view/";
    }

    public function render(array $data, string $viewName)
    {
        $content = file_get_contents($this->path . $viewName . ".blade.php");

        $content_replace = [
            '{{$title}}'    => $data["title"],
            '{{$body}}'  => $data["body"],
            '{{$author}}'=> $data["author"],
        ];

        return strtr($content, $content_replace );

        //Для замены используем str_replace где первым аргументом передам массив
        //Также помогут функции array_keys для получения ключей замены и array_values для получения
        // значений замены

        //Для модифицирования ключей замены под вид {{$var}} используем array_map

    }
}
