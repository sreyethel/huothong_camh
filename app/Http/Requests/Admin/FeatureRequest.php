<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
class FeatureRequest extends FormRequest
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
            'title'     => 'required|max:255',
            'status'    => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required'    => __('validate.input.title'),
            'title.max'         => __('validate.input.max', ['attribute' => __('validate.input.title'), 'max' => 255]),
            'status.required'   => __('validate.select.status'),
        ];
    }
}
