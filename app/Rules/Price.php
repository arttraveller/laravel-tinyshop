<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

/**
 * Price validation rule
 */
class Price implements Rule
{

    private const MIN_PRICE = 0.01;
    private const MAX_PRICE = 100000;

    /**
     * @var string|null validation error message
     */
    private $message;


    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value): bool
    {
        $result = false;
        if ($value < self::MIN_PRICE) {
            $this->message = 'Minimum price is ' . self::MIN_PRICE;
        } else if ($value > self::MAX_PRICE) {
            $this->message = 'Maximum price is ' . self::MAX_PRICE;
        } else {
            $result = true;
        }

        return $result;
    }


    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        return $this->message;
    }

}
