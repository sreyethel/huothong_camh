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
            'name'          => 'required',
            'price'         => 'required',
            'size'          => 'required',
            'category'      => 'required|array',
            'thumbnail'     => 'required',
            'content'       => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required'             => 'Name is required',
            'price.required'            => 'Price is required',
            'size.required'             => 'Size is required',
            'category.required'         => 'Category is required',
            'category.array'            => 'Category is at least one',
            'thumbnail.required'        => 'Thumbnail is required',
            'content.required'          => 'Description is required',
        ];
    }
}
