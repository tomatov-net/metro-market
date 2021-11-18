<?php declare(strict_types=1);

namespace App\DTO;

use Illuminate\Support\Str;

class BaseDTO implements DTOInterface
{
    public function fill(array $arrayData): self
    {
        foreach ($arrayData as $key => $value) {
            $methodName = 'set' . Str::camel($key);
            if (method_exists($this, $methodName)) {
                $this->$methodName($value);
            }
        }
        return $this;
    }

    public static function make($arrayData): self
    {
        return (new static())->fill($arrayData);
    }
}
