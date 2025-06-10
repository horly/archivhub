<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateClasseurForm extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
            'classeur-number' => 'required',
            'classeur-description' => 'required',
            'classeur-boite' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'classeur-number.required' => __('dashboard.this_field_is_required'),
            'classeur-description.required' => __('dashboard.this_field_is_required'),
            'classeur-boite.required' => __('dashboard.please_select_the_box'),
        ];
    }
}
