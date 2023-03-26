<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserLoginRequest extends FormRequest
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

            'phone' => 'required|numeric|digits:10',

            //
        ];
        // cusrom message;

    }
    public function messages(): array
    {
        return [
            'phone.required' => 'The upload file must be type : pdf,jpg, jpeg, png.',
        ];
    }
}