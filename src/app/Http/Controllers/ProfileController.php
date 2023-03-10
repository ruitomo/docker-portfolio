<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    //登録処理
    public function add(Request $request)
    {
        return view('layouts.profile');
        // $user = User::find($id);
        // return view('layouts.profile', ['user' => $user]);
    }

    public function create(Request $request)
    {
        $user = new User;
        $form = $request->all();
        unset($form['_token']);
        $user->fill($form)->save();
        return redirect('/profile');
        // $user = Auth::user();
        // $user->name = $request->input('name');
        // $user->gender = $request->input('gender');
        // $user->birthday = $request->input('birthday');
        // $user->img_path = $request->input('img_path');
        // $user->residence = $request->input('residence');
        // $user->job = $request->input('job');
        // $user->homesauna = $request->input('homesauna');
        // $user->aufguss = $request->input('aufguss');
        // $user->gosauna = $request->input('gosauna');
        // $user->saunahat = $request->input('saunahat');
        // $user->hobby = $request->input('hobby');
        // $user->routine = $request->input('routine');
        // $user->introduction = $request->input('introduction');
        // $user->save();

        // return redirect()->back()->with('success', 'プロフィールが更新されました。');
    }

    public function edit(Request $request)
    {
        $form = User::find($request->id);
        return view('layouts.edit', ['form' => $form]);
    }


    public function update(Request $request, $id)
    {

        $user = User::find($request->id);
        if (!$user) {
            return redirect()->back()->withErrors(['message' => 'ユーザーが見つかりませんでした']);
        }
        $user->fill($request->all());
        $user->save();
        return redirect()->back()->with('success', 'プロフィールを更新しました');
        // $user = Auth::user();
        // $user->name = $request->input('name');
        // $user->gender = $request->input('gender');
        // $user->birthday = $request->input('birthday');
        // $user->img_path = $request->input('img_path');
        // $user->residence = $request->input('residence');
        // $user->job = $request->input('job');
        // $user->homesauna = $request->input('homesauna');
        // $user->aufguss = $request->input('aufguss');
        // $user->gosauna = $request->input('gosauna');
        // $user->saunahat = $request->input('saunahat');
        // $user->hobby = $request->input('hobby');
        // $user->routine = $request->input('routine');
        // $user->introduction = $request->input('introduction');
        // $user->save();

        // return redirect()->back()->with('success', 'プロフィールが更新されました。');
        // return redirect('/profile');
    }
}