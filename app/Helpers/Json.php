<?php

namespace App\Helpers;


/**
 * Json helper
 */
class Json
{

    /**
     * Encodes the given value into a JSON string.
     *
     * @param mixed $value
     * @return string
     */
    public static function encode($value): string
    {
        return json_encode($value,  JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    }

}
