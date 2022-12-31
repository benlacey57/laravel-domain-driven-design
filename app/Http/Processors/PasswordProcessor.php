<?php

namespace App\Http\Processors;

use App\Exceptions\HowApp\ValidationException;
use App\Rules\Lowercase;
use App\Rules\NonAlpha;
use App\Rules\Uppercase;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

/**
 * A processor class for setting passwords. Takes submitted data validates
 * it and performs any other processing on the data as required.
 *
 * @author Fluid Design Technology <infp@fluiddesigntechnology.com>
 */
class PasswordProcessor implements ProcessorInterface
{
    /**
     * Minimum password length.
     */
    protected $minLength = 8;

    /**
     * Validate the password data provided.
     *
     * @param array $password
     * @param array $additionalRules
     * @param array $additionalMessages
     * @return array
     * @throws ValidationException
     */
    public function validate($password, $additionalRules = [], $additionalMessages = [])
    {
        $this->password = $password;
        $this->rules = $this->rules($additionalRules);
        $this->messages = $this->messages($additionalMessages);
        $this->validator = $this->validator();

        if ($this->validator->fails()) {
            $this->validator->errors()->add('form', ['password' => __('hhf/messages.validation.password.message')]);

            throw new ValidationException(
                $this->validator,
                __('hhf/messages.validation.failed.set-password')
            );
        }
    }

    /**
     * Set the validation rules for validating the invitation data provided.
     *
     * @param $additionalRules
     * @return array
     */
    protected function rules($additionalRules)
    {
        $rules = [
            'password' => [
                'required',
                'confirmed',
                'min:' . $this->minLength,
                new Uppercase(),
                new Lowercase(),
                new NonAlpha(),
            ],
        ];

        if ($additionalRules) {
            $rules += $additionalRules;
        }

        return $rules;
    }

    /**
     * Set custom error messages for one or more
     * of the the defined validation rules.
     *
     * @param $additionalMessages
     * @return array
     */
    protected function messages($additionalMessages)
    {
        $messages = [
            'password.required' => __('hhf/messages.validation.required.password'),
            'password.confirmed' => __('hhf/messages.validation.confirmed.password'),
            'password.min' => __('hhf/messages.validation.min.password', ['length' => $this->minLength]),
        ];

        if ($additionalMessages) {
            $messages += $additionalMessages;
        }

        return $messages;
    }

    /**
     * Create a validator instance using the Validator facade.
     *
     * @return Illuminate\Validation\Validator
     */
    protected function validator()
    {
        return Validator::make($this->password, $this->rules, $this->messages);
    }
}
