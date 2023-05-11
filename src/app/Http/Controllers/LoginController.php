<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function guest()
    {
        $guestUserId = 1; //ゲストユーザーのIDを１とする
        $user = User::find($guestUserId);
        Auth::login($user);
        //ログイン後リダイレクトしたいところにリダイレクトするなどしてください
        return redirect()->route('recruit.index');
    }
}