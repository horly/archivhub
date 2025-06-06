<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateSiteForm extends FormRequest
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
            'site-name' => 'required',
            'site-address' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'site-name.required' => __('dashboard.this_field_is_required'),
            'site-address.required' => __('dashboard.this_field_is_required'),
        ];
    }
}
