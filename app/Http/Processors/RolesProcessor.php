<?php

namespace App\Http\Processors;

use App\Exceptions\HowApp\ValidationException;
use Illuminate\Support\Facades\Validator;

/**
 * A processor class for user roles. Takes submitted data validates it
 * and performs any other processing on the data as required.
 *
 * @author Greg Merriman <gmerriman@hhf.uk.com>
 * @copyright Henry Howard Finance Group
 */
class RolesProcessor implements ProcessorInterface
{
    /**
     * Validate the user role data provided.
     *
     * @param $role
     * @return array
     */
    public function validate($role)
    {
        $this->role = $role;
        $this->rules = $this->rules();
        $this->messages = $this->messages();
        $this->validator = $this->validator();

        if ($this->validator->fails()) {
            $this->throwValidationException();
        }
    }

    /**
     * Set the validation rules for validating the user role data provided.
     *
     * @return array
     */
    protected function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'permissions' => 'required|array|min:1',
        ];
    }

    /**
     * Set custom error messages for one or more
     * of the the defined validation rules.
     *
     * @return array
     */
    protected function messages()
    {
        return [
            'permissions.required' => __('validation.required.permissions'),
        ];
    }

    /**
     * Create a validator instance using the Validator facade.
     *
     * @return Illuminate\Validation\Validator
     */
    protected function validator()
    {
        return Validator::make($this->role, $this->rules, $this->messages);
    }

    /**
     * Throw a HowApp ValidationException following failed validation.
     *
     * @return void
     */
    protected function throwValidationException()
    {
        if ($this->isEdit()) {
            $this->throwValidationExceptionForEdit();
        }

        $this->throwValidationExceptionForCreate();
    }

    /**
     * Check if the request was to edit a user role.
     *
     * @return bool
     */
    protected function isEdit()
    {
        if ((isset($this->role['id'])) && (isset($this->role['_method'])) && ($this->role['_method'] == 'PUT')) {
            return true;
        }

        return false;
    }

    /**
     * Throw a HowApp ValidationException for a edit
     * role request following failed validation.
     * Sets a message specifically for the edit action.
     *
     * @return void
     * @throws ValidationException
     */
    protected function throwValidationExceptionForEdit()
    {
        throw new ValidationException(
            $this->validator,
            __('hhf/messages.validation.failed.edit-role')
        );
    }

    /**
     * Throw a HowApp ValidationException for a create
     * role request following failed validation.
     * Sets a message specifically for the create action.
     *
     * @return void
     * @throws ValidationException
     */
    protected function throwValidationExceptionForCreate()
    {
        throw new ValidationException(
            $this->validator,
            __('hhf/messages.validation.failed.create-role')
        );
    }
}
