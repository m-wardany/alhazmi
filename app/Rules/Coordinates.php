<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class Coordinates implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // Explode the value to separate latitude and longitude
        $coordinates = explode(',', $value);

        // Check if the array has exactly two elements
        if (count($coordinates) != 2) {
            $fail('Invalid Lat, Long format.');
            return;
        }

        // Check if each part is a valid coordinate (latitude or longitude)
        foreach ($coordinates as $coordinate) {
            // Regular expression to validate coordinates
            $pattern = '/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/';

            // Check if the value matches the pattern for latitude or longitude
            if (!preg_match($pattern, trim($coordinate))) {
                $fail('Invalid Lat, Long format.');
            }
        }

    }
}
