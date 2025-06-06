<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateArmoireForm extends FormRequest
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
            'armoire-number' => 'required',
            'armoire-description' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'armoire-number.required' => __('dashboard.this_field_is_required'),
            'armoire-description.required' => __('dashboard.this_field_is_required'),
        ];
    }
}
