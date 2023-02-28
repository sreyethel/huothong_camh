<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
class ProductRequest extends FormRequest
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
            'title'         => 'required|max:255',
            'price'         => 'required',
            'size'          => 'max:100',
            'content'       => 'required',
            'thumbnail'     => 'required',
            'status'        => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required'            => __('validate.input.title'),
            'title.max'                 => __('validate.input.max',['attribute' => __('form.body.label.title'),'max' => 255]),
            'price.required'            => __('validate.input.price'),
            'size.max'                  => __('validate.input.max',['attribute' => __('form.body.label.size'),'max' => 100]),
            'content.required'          => __('validate.input.content'),
            'thumbnail.required'        => __('validate.select.thumbnail'),
            'status.required'           => __('validate.select.status'),
        ];
    }
}