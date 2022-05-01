<?php

namespace App\Http\Requests\Contact;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ContactUpdateRequest extends FormRequest
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
        $contact = $this->route('contact');
        return [
            'name' => 'required|string|min:5',
            'email' => ['required', 'email', Rule::unique('contacts', 'email')->ignore($contact)->whereNull('deleted_at')],
            'contact' => ['required', 'string', 'min:9', Rule::unique('contacts', 'contact')->ignore($contact)->whereNull('deleted_at')],
        ];
    }
}
