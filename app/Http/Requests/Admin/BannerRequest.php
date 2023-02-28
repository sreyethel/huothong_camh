<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
class BannerRequest extends FormRequest
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
            'title'         => 'max:255',
            'page'          => 'required',
            'thumbnail'     => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.max'                 => __('validate.input.title_max'),
            'page.required'             => __('validate.select.page'),
            'thumbnail.required'        => __('validate.select.thumbnail'),
        ];
    }
}