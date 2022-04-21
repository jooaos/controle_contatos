<?php

namespace App\Http\Requests\Contact;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ContactCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|min:5',
            'email' => ['required', 'email', Rule::unique('contacts', 'email')->whereNull('deleted_at')],
            'contact' => ['required', 'string', 'min:9', Rule::unique('contacts', 'contact')->whereNull('deleted_at')],
        ];
    }
}
