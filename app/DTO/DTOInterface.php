<?php

namespace App\DTO;

interface DTOInterface
{
    /**
     * Fill DTO via assoc array
     * Array keys must be equal property names
     *
     * @param array $arrayData
     */
    public function fill(array $arrayData);

    /**
     * Make DTO from keyed array
     *
     * @param $arrayData
     */
    public static function make($arrayData);
}
