<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateDocumentForm extends FormRequest
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
            'document-titre' => 'required',
            'document-reference' => 'required',
            'document-folder' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'document-titre.required' => __('dashboard.this_field_is_required'),
            'document-reference.required' => __('dashboard.this_field_is_required'),
            'document-folder.required' => __('dashboard.please_select_the_folder'),
        ];
    }
}
