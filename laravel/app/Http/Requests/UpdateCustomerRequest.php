<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCustomerRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['sometimes', 'required', 'string', 'min:2', 'max:150'],
            'email' => [
                'sometimes',
                'required',
                'email',
                'max:255',
                Rule::unique('customers', 'email')->ignore($this->route('customer')),
            ],
            'phone' => ['sometimes', 'nullable', 'string', 'max:30'],
        ];
    }
}
