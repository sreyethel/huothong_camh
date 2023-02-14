<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
class PartnerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth('admin')->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'          => 'required',
            'logo'          => 'required',
            'content'       => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required'             => 'Name is required',
            'logo.required'             => 'Logo is required',
            'content.required'          => 'Content is required',
        ];
    }
}
