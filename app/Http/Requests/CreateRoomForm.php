<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateRoomForm extends FormRequest
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
            //
            'room-name' => 'required',
            'room-description' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'room-name.required' => __('dashboard.this_field_is_required'),
            'room-description.required' => __('dashboard.this_field_is_required'),
        ];
    }
}
