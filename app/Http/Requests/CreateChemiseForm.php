<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateChemiseForm extends FormRequest
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
            'chemise-number' => 'required',
            'chemise-description' => 'required',
            'chemise-classeur' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'chemise-number.required' => __('dashboard.this_field_is_required'),
            'chemise-description.required' => __('dashboard.this_field_is_required'),
            'chemise-classeur.required' => __('dashboard.please_select_the_binder'),
        ];
    }
}
