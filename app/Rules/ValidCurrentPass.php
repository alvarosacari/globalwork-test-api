<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidCurrentPass implements Rule
{
    /**
     * Create a new rule instance.
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed  $value
     *
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if (\Hash::check($value, $this->user->password)) {
            return true;
        }

        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Su contraseña actual no es válida.';
    }
}
