<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\MenuCreate;
use App\Menu;
use App\User;
use App\MenuTime;
use Illuminate\Support\Facades\Log;



class MenuController extends Controller
{

  public function menuCreate($id) {
    // Log::debug("NO,26".$id);

    $user = Auth::user();
    // Log::debug("NO,27".$user);

    if($user->prefectures == 15 || $user->prefectures == 16 || $user->prefectures == 17
    || $user->prefectures == 18)
    {


      $menus = Menu::orderBy('menus.id','asc')
      ->select(
        'menus.*','menu_times.*')
      ->leftjoin('menu_times','menu_times.menu_id','=','menus.id')
      ->where('menu_times.pref' ,'=', $user->prefectures)
      ->get();



      $timers=MenuTime::where('menu_times.pref' ,'=', $user->prefectures)->first();
      $timer = new Carbon("+ $timers->time_pref minutes",'Asia/Tokyo');


    }
    else
    {
      $menus = Menu::orderBy('id','asc')
      ->select(
        'menus.*','id as menu_id')
      ->get();

      $timer = new Carbon("+ 50 minutes",'Asia/Tokyo');
    }
    // Log::debug("NO,28".$menus);
    // Log::debug("NO,29".$timer);
    return  view('menu/create', [
      'timer' => $timer,
      'menus' => $menus
    ]);
  }

  public function menuMake($id) {
    // Log::debug("NO,23".$id);
    return view('menu/make');
  }

  public function menuMakeSave(MenuCreate $request)
  {

    $dir = 'sample';
    // Log::debug("NO,3.$dir");

    $file_name = $request->file('image')->getClientOriginalName();

    // Log::debug("NO,5".$file_name);
    // $result =
    $request->file('image')->storeAs('public/' . $dir, $file_name);

    // Log::debug("NO,60".$result);
    // フォルダモデルのインスタンスを作成する
    $data = new Menu();
    // タイトルに入力値を代入する
    $data->name = $request->name;
    $data->price = $request->price;
    $data->image = $file_name;

    // $result =
    $data->save();

      // Log::debug("NO,61".$result);


      $time_prefs = collect([10,20,30,40,50]);
      $prefs = collect([17,18,16,15,0]);
      foreach($time_prefs as $key =>$time_pref){
        $menu = new MenuTime();
        $menu->menu_id = $data->id;
        $menu->time_pref = $time_pref;
        $menu->pref = $prefs[$key];
        // $result =
        $menu->save();
        // Log::debug("NO,62".$result);
      }






      return redirect()->route('users.index', [
      ]);
  }

//   public function menuindex() {
//
//
//
//     $user = Auth::user();
//     $datas = Menu::orderBy('menus.created_at','desc')
//     ->select(
//       'menus.*','users.*','menus.name as menus_name')
//     ->leftjoin('users','users.id','=','menus.user_id')
//     ->where('menus.user_id' ,'=', $user->id)
//     ->get();
//     return view('menu/index', [
//         'datas' => $datas
//     ]);
//   }
//   public function menuDelete($id)
//       {
//
//      $data = Menu::find($id);
//
//      $data->delete();
//
//      return redirect()->route('menus.index',);
//
//   }
}
