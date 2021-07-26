<?php

namespace App\Resources;

class Resource
{
    public $originalElement;

    public function __construct(array $element)
    {
        $this->originalElement = $element;
        $this->fill();
    }

    public function fill()
    {
        foreach ($this->originalElement as $key => $value) {
            $this->$key = $value;
        }
    }

    public static function collection(array $collection): array
    {
        $out = [];
        foreach ($collection as $item) {
            $out[] = self::make($item);
        }
        return $out;
    }

    public static function make($object): array
    {
        return (new static($object))->toArray();
    }

    public function toArray()
    {
        return [];
    }
}
