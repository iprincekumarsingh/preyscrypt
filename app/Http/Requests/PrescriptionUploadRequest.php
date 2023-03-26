<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PrescriptionUploadRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'file' => 'required|mimes:pdf,docx,doc,jpg,jpeg,png',
        ];
    }
    public function messages(): array
    {
        return [
            'file.required' => 'Acceptable file types are pdf, docx, doc, jpg, jpeg, png',
        ];
    }
}