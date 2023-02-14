<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
class MediaRequest extends FormRequest
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
            'title'         => 'required',
            'content'       => 'required',
            'thumbnail'     => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required'            => 'Title is required',
            'content.required'          => 'Content is required',
            'thumbnail.required'        => 'Thumbnail is required',
        ];
    }
}
