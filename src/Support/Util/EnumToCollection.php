<?php

namespace Support\Util;

class EnumToCollection
{
    public static function transform(string $enumClass)
    {
        return collect($enumClass::toValues())->map(function ($key) {
            return (object)['id' => $key, 'name' => $key];
        });
    }
}
