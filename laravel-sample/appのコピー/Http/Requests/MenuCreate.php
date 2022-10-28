<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MenuCreate extends FormRequest
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
          'name' => 'required','string','max:99',
          'price' => 'required','numeric','max:5',
          'image' => 'required',
        ];
    }
    public function attributes()
{
    return [
        'name' => '名前',
        'price' => '値段',
        'image' => '画像',
    ];
}
}
