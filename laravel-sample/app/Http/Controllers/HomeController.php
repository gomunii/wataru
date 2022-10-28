<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    public function index()
    {
        // ログインユーザーを取得する
        $user = Auth::user();
        // Log::debug("NO,1".$user);
        // ログインユーザーに紐づくフォルダを一つ取得する
        $folder = $user->fresh()->first();
        // Log::debug("NO,2".$folder);
        if ($user->email == "gomunii@icloud.com") {
          return redirect()->route('ordres.store');
        }
        // Log::debug("NO,4".$user->email);
        // フォルダがあればそのフォルダのタスク一覧にリダイレクトする

        return redirect()->route('users.index');

    }
}
