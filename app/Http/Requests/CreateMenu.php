<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateMenu extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name'     => 'required|max:30',
            'image'    => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'price'    => 'required|numeric',
            'category' => 'required|numeric|min:1|max:6',
        ];
    }

    public function attributes()
    {
        return [
            'name'     => '料理名',
            'image'    => '画像',
            'price'    => '料金',
            'category' => 'カテゴリー',
        ];
    }
}
