<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class DifferentFrom implements Rule
{
    private $otherValue;

    public function __construct($otherValue)
    {
        $this->otherValue = $otherValue;
    }

    public function passes($attribute, $value)
    {
        return $value != $this->otherValue;
    }

    public function message()
    {
        return 'The :attribute must be different from the other value.';
    }
}
