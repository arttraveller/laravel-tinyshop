<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

/**
 * Slug validation rule
 */
class Slug implements Rule
{

    private const MIN_LENGTH = 2;
    private const MAX_LENGTH = 255;

    /**
     * @var string|null validation error message
     */
    private $message;
    /**
     * @var bool whether slug valid
     */
    private $isValidSlug = true;


    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value): bool
    {
        $this->checkLength($value);
        if ($this->isValidSlug) {
            $this->checkCharacters($value);
        }

        return $this->isValidSlug;
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


    /**
     * Checks the slug length
     */
    private function checkLength($slug): void
    {
        $slugLen = mb_strlen($slug, 'UTF-8');
        if ($slugLen < self::MIN_LENGTH) {
            $this->isValidSlug = false;
            $this->message = 'The :attribute must be at least ' . self::MIN_LENGTH . ' characters.';
        } else if ($slugLen > self::MAX_LENGTH) {
            $this->isValidSlug = false;
            $this->message = 'The :attribute may not be greater than ' . self::MAX_LENGTH . ' characters.';
        }
    }


    /**
     * Checks the slug characters
     */
    private function checkCharacters($slug): void
    {
        $pattern = '@^[a-z0-9_-]+$@';
        if ( !preg_match($pattern, $slug)) {
            $this->isValidSlug = false;
            $this->message = 'Only [a-z0-9_-] symbols are allowed.';
        }
    }

}
