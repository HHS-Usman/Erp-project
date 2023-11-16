<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class FileOptionMatch implements Rule
{
    protected $selectedOption;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($selectedOption)
    {
        $this->selectedOption = $selectedOption;
    }


    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $allowedMimeTypes = [];

        if ($this->selectedOption === '1') {
            $allowedMimeTypes = ['text/csv'];
        } elseif ($this->selectedOption === '2') {
            $allowedMimeTypes = ['application/vnd.ms-excel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
        }

        return in_array($value->getClientMimeType(), $allowedMimeTypes);
    }


    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The selected file type does not match the chosen option.';
    }
}
