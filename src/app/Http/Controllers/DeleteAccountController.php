<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeleteAccountController extends Controller
{
    public function deleteAccount(Request $request)
    {
        // ユーザーが作成したrecruitsを削除
        Auth::user()->recruits()->delete();

        // ユーザー情報を削除
        Auth::user()->delete();

        // セッションをクリア
        $request->session()->invalidate();

        // ログアウト
        $request->session()->regenerateToken();

        // トップページにリダイレクト
        return redirect('/');
    }
}