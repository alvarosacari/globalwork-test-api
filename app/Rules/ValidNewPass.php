<?php

namespace App\Rules;

use App\User;
use Illuminate\Contracts\Validation\Rule;

class ValidNewPass implements Rule
{
    /**
     * Create a new rule instance.
     */
    public function __construct(User $user)
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
            return false;
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'La nueva contraseña debe ser diferente a la actual.';
    }
}
