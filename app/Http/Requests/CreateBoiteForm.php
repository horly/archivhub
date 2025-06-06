<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateBoiteForm extends FormRequest
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
            'boite-number' => 'required',
            'boite-description' => 'required',
            'boite-etagere' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'boite-number.required' => __('dashboard.this_field_is_required'),
            'boite-description.required' => __('dashboard.this_field_is_required'),
            'boite-etagere.required' => __('dashboard.please_select_the_box'),
        ];
    }
}
