<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateEtagereForm extends FormRequest
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
            'etagere-number' => 'required',
            'etagere-description' => 'required',
            'etagere-armoire' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'etagere-number.required' => __('dashboard.this_field_is_required'),
            'etagere-description.required' => __('dashboard.this_field_is_required'),
            'etagere-armoire.required' => __('dashboard.please_select_the_cabinet'),
        ];
    }
}
