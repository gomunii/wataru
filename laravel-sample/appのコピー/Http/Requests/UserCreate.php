<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserCreate extends FormRequest
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
            'last_name' => 'required','string','max:99',
            'first_name' => 'required','string','max:99',
            'postcode' => 'required|digits:7',
            'prefectures' => 'required|digits_between:1,5',
            'address' => 'required','string','max:99',
            'phone' => 'required|digits_between:9,12',
        ];
    }
    public function attributes()
{
    return [
        'last_name' => '苗字',
        'first_name' => '名字',
        'postcode' => '郵便番号',
        'prefectures' => '都道府県',
        'address' => '住所',
        'phone' => '電話番号',
    ];
}

}
