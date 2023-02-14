<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
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
            'ordering'  => 'required|numeric',
            'status'    => 'required|numeric',
            'image'     => 'required',
        ];
    }

    public function messages()
    {
        return [
            'ordering.required' => 'Please enter ordering',
            'ordering.numeric'  => 'Ordering must be a number',
            'status.required'   => 'Please select status',
            'status.numeric'    => 'Status must be a number',
            'image.required'    => 'Please select image',
        ];
    }
}