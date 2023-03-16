<?php

namespace App\Http\Controllers;

use App\Models\Recruit;
use Illuminate\Http\Request;

class RecruitController extends Controller
{
    // 募集一覧
    public function index()
    {
        $recruits = Recruit::all();

        return view('recruits.index', compact('recruits'));
        // return view('recruits.index', ['recruit' => $recruit]);
    }
    // 募集新規登録画面
    public function create()
    {
        return view('recruits.create');
    }
    // 募集新規登録
    public function store(Request $request)
    {
        // $request->validate([
        //     'name' => 'required|max:255',
        //     'age' => 'required|integer',
        //     'gender' => 'required',
        //     'description' => 'required|max:500',
        // ]);

        Recruit::create($request->all());

        return redirect()->route('recruit.index');
    }
    // 募集編集画面
    public function edit(Recruit $recruit)
    {
        return view('recruits.edit', compact('recruit'));
    }
    // 募集編集機能
    public function update(Request $request, Recruit $recruit)
    {
        // $request->validate([
        //     'name' => 'required|max:255',
        //     'age' => 'required|integer',
        //     'gender' => 'required',
        //     'description' => 'required|max:500',
        // ]);

        $recruit->update($request->all());

        return redirect()->route('recruit.index');
    }
    // 募集の削除
    public function destroy(Recruit $recruit)
    {
        $recruit->delete();

        return redirect()->route('recruit.index');
    }
}