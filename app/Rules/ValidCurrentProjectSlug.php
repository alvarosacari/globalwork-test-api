<?php

namespace App\Rules;

use App\Candidate;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Str;

class ValidCurrentProjectSlug implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($candidate)
    {
        $this->project = $candidate;
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
        $slug = Str::slug($value);

        $candidate = Candidate::where('id', '!=', $this->project->id)
            ->where('slug', $slug)
            ->first();

        return is_null($candidate);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'El campo :attribute (slug) ya ha sido tomado.';
    }
}
