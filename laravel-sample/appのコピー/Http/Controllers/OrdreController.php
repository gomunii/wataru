<?php
namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Ordre;
use App\Menu;
use App\User;
use App\MenuTime;
use DateTime;
use Illuminate\Support\Facades\Log;

class OrdreController extends Controller
{
  public function ordreCreateSave(Request $request)
  {
    // Log::debug("NO,33".$request);

    $user = Auth::user();
    // Log::debug("NO,34".$user);

    $data = new Ordre();
    // タイトルに入力値を代入する
    $data->user_id = $user->id;
    $data->menu_id = $request->menu_id;
    $data->quantity = $request->quantity;
    $data->situation = 1;

    $result = $data->save();
    // Log::debug("NO,35-1", $result);
    // Log::debug("NO,35".$data);

  return redirect()->route('ordres.index', [

  ]);

 }


  public function ordresindex() {
    // Log::debug("NO,37");

    $user = Auth::user();
    // Log::debug("NO,38".$user);
    if($user->prefectures == 15 || $user->prefectures == 16 || $user->prefectures == 17
    || $user->prefectures == 18)
    {

    $datas = Ordre::findByUserIdAndSetTimePrefAndSituationFlg($user_id, $user->prefectures, 4);

    $timers = MenuTime::where('menu_times.pref' ,'=', $user->prefectures)->first();


    }
    else{
      $datas = Ordre::orderBy('ordres.created_at', 'desc')
      ->select(
        'menus.*','users.*','ordres.*','menus.name as menus_name',
        'ordres.created_at as ordres_created_at')
      ->leftjoin('users','users.id','=','ordres.user_id')
      ->rightjoin('menus','menus.id','=','ordres.menu_id')
      ->where('ordres.user_id' ,'=', $user->id )
      ->where('ordres.situation' ,'!=', 4)
      ->get();


      $timers = "";
    }

    // Log::debug("NO,39".$datas);
    // Log::debug("NO,40".$timers);

      return view('ordre/index', [
          'datas' => $datas,
          'timers' => $timers,


      ]);
  }

  public function ordreslog() {
    // Log::debug("NO,44");

    $user = Auth::user();
    // Log::debug("NO,45".$user);
    if($user->prefectures == 15 || $user->prefectures == 16 || $user->prefectures == 17
    || $user->prefectures == 18)
    {
    $datas = Ordre::orderBy('ordres.created_at', 'desc')
    ->select(
      'menus.*','users.*','ordres.*','menu_times.*','menus.name as menus_name',
      'ordres.created_at as ordres_created_at')
    ->leftjoin('users','users.id','=','ordres.user_id')
    ->rightjoin('menus','menus.id','=','ordres.menu_id')
    ->rightjoin('menu_times','menu_times.menu_id','=','menus.id')
    ->where('ordres.user_id' ,'=', $user->id )
    ->where('menu_times.pref' ,'=', $user->prefectures)
    ->where('ordres.situation' ,'=', 4)
    ->get();


    $timers = MenuTime::where('menu_times.pref' ,'=', $user->prefectures)->first();


    }
    else{
      $datas = Ordre::orderBy('ordres.created_at', 'desc')
      ->select(
        'menus.*','users.*','ordres.*','menus.name as menus_name',
        'ordres.created_at as ordres_created_at')
      ->leftjoin('users','users.id','=','ordres.user_id')
      ->rightjoin('menus','menus.id','=','ordres.menu_id')
      ->where('ordres.user_id' ,'=', $user->id )
      ->where('ordres.situation' ,'=', 4)
      ->get();


      $timers = "";
    }
    // Log::debug("NO,46".$datas);
    // Log::debug("NO,47".$timers);


      return view('ordre/log', [
          'datas' => $datas,
          'timers' => $timers,


      ]);
  }

  public function ordresstore() {
    // Log::debug("NO,51");
    $datas= Ordre::orderBy('ordres.created_at', 'desc')
    ->select(
      'ordres.*','users.*','menus.*','menu_times.*','menus.name as menus_name',
      'ordres.created_at as ordres_created_at','ordres.id as ordres_id')
    ->leftjoin('users','users.id','=','ordres.user_id')
    ->leftjoin('menus','menus.id','=','ordres.menu_id')
    ->leftjoin('menu_times', function ($join) {
            $join->on('menu_times.menu_id','=','menus.id')
            ->On('menu_times.pref', '=', 'users.prefectures');
        })
    ->where('ordres.situation' ,'=', 4)
    ->get();
    // Log::debug("NO,52".$datas);

    $orders= Ordre::orderBy('ordres.created_at', 'desc')
    ->select(
      'ordres.*','users.*','menus.*','menu_times.*','menus.name as menus_name',
      'ordres.created_at as ordres_created_at','ordres.id as ordres_id')
    ->leftjoin('users','users.id','=','ordres.user_id')
    ->leftjoin('menus','menus.id','=','ordres.menu_id')
    ->leftjoin('menu_times', function ($join) {
            $join->on('menu_times.menu_id','=','menus.id')
            ->On('menu_times.pref', '=', 'users.prefectures');
        })
    ->where('ordres.situation' ,'!=', 4)
    ->get();
    // Log::debug("NO,53".$orders);

      return view('ordre/store', [
          'datas' => $datas,
          'orders' => $orders,

      ]);
  }
  public function orderChange(int $id)
  {
    // Log::debug("NO,57".$id);

    $data = Ordre::find($id);

    // Log::debug("NO,58".$data);

    if($data->situation == 1)
    {
    $result = Ordre::where('id','=',$id)->update(['situation' => 2]);
    }
    if($data->situation == 2)
    {
    $result = Ordre::where('id','=',$id)->update(['situation' => 3]);
    }
    if($data->situation == 3)
    {
    $result = Ordre::where('id','=',$id)->update(['situation' => 4]);
    }



    return redirect()->route('ordres.store');
  }

}
