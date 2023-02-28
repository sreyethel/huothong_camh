<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
class PageRequest extends FormRequest
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
            'title'                 => 'required',
            'content'               => $this->page != config('dummy.page_type.contact_us') ? 'required' : '',
            'short_detail_about_us' => $this->page == config('dummy.page_type.about_us') ? 'required' : '',
            'thumbnail'             => $this->page != config('dummy.page_type.contact_us') ? 'required' : '',
        ];
    }
    public function messages()
    {
        return [
            'title.required'                    => __('validate.input.title'),
            'content.required'                  => __('validate.input.content'),
            'short_detail_about_us.required'    => __('validate.input.short_detail_about_us'),
            'thumbnail.required'                => __('validate.select.thumbnail'),
        ];
    }
}