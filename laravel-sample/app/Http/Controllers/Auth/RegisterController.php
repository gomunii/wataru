<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/users';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
     public function __construct()
{
    $this->middleware('guest');
}

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
     protected function validator(array $data)
     {
     return Validator::make($data, [
         'name' => 'required|string|max:99',
         'last_name' => 'required|string|max:99',
         'first_name' => 'required|string|max:99',
         'postcode' => 'required|digits:7',
         'prefectures' => 'required|digits_between:1,5',
         'address' => 'required|string|max:99',
         'phone' => 'required|digits_between:9,12',
         'email' => 'required|string|email|max:99|unique:users',
         'password' => 'required|string|min:6|confirmed',
     ], [], [
         'name' => 'ユーザー名',
         'email' => 'メールアドレス',
         'last_name' => '名前',
         'first_name' => '苗字',
         'postcode' => '郵便番号',
         'prefectures' => '都道府県',
         'address' => '住所',
         'phone' => '電話番号',
         'password' => 'パスワード',
     ]);
     }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
      var_dump($data);exit;
        return User::create([
            'name' => $data['name'],
            'last_name' => $data['last_name'],
            'first_name' => $data['first_name'],
            'postcode' => $data['postcode'],
            'prefectures' => $data['prefectures'],
            'address' => $data['address'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

}
