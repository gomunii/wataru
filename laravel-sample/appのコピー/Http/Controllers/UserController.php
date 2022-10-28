<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\UserCreate;
use App\User;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
  {
  public function userindex() {
    // Log::debug("NO,8");

    $user = Auth::user();
    // Log::debug("NO,9".$user);

    $datas = User::orderBy('created_at', 'desc')
    ->where('id' ,'=', $user->id)
    ->get();
    // Log::debug("NO,10".$datas);


    return view('user/index', [
        'datas' => $datas
    ]);
  }

  public function userEdit(int $id)
  {
    // Log::debug("NO,15 ".$id);

    $user = Auth::user();
    if($user->id == $id)
    {
      $data = User::find($id);
      // Log::debug("NO,16".$data);
      return view('user/edit', [
          'data' => $data,
      ]);
    }
    else
    {
      return redirect()->route('login');
    }
  }

  public function userEditSave(UserCreate $request) {
    // Log::debug("NO,19".$request);
    if(!empty($request->id)) {

      $data = User::find($request->id);
      // Log::debug("NO,20".$request->id);
      $data->last_name = $request->last_name;
      $data->first_name = $request->first_name;
      $data->postcode = $request->postcode;
      $data->prefectures = $request->prefectures;
      $data->address = $request->address;
      $data->phone = $request->phone;
      $data->save();
      // Log::debug("NO,21".$data);
    }

    return redirect()->route('users.index');
  }
  // public function userDelete($id)
  //     {
  //
  //    $data = User::find($id);
  //
  //    $data->delete();
  //
  //    return redirect()->route('users.index',);
  //
  // }

}
