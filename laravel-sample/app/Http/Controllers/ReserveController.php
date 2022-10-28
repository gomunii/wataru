<?php
namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Reserve;

class ReserveController extends Controller
  {
  public function reserve() {


    return view('reserve/reserve');
  }
}
