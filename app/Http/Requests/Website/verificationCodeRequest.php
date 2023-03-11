<?php

namespace App\Http\Requests\Website;

use Illuminate\Foundation\Http\FormRequest;

class verificationCodeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {        
        return [
            'phone'      => request('type') == 'register' ? 'required|unique:users,phone' : 'required|exists:users,phone',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */

    public function messages()
    {
        return [
            'phone.required'     => __('website.form.placeholder.phone'),
            'phone.unique'       => __('website.form.placeholder.phone_unique'),
            'phone.exists'       => __('website.form.placeholder.phone_exists'),
        ];
    }
}