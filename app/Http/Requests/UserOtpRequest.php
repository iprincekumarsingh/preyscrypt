<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserOtpRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'otp'=>'required|numeric|digits:6',
            //
        ];
        
    }

    public function messages(): array
    {
        return [
            'otp.required'=>'Enter your 4 digit OTP',
        ];
    }
}
