<?php

namespace App\Http\Controllers;

use App\Models\Recruit;
use Illuminate\Http\Request;
use App\Models\Apply;

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

        // Recruit::create($request->all());

        // return redirect()->route('recruit.index');

        $data = $request->all();
        $data['from_user_id'] = auth()->id();

        Recruit::create($data);

        return redirect()->route('recruit.my-recruits');

        //     $recruit = new Recruit($request->all());
        // $recruit->from_user_id = auth()->id();
        // $recruit->save();

        // return redirect()->route('recruit.index');
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

        return redirect()->route('recruit.my-recruits');
    }
    // 募集の削除
    public function destroy(Recruit $recruit)
    {
        $recruit->delete();

        return redirect()->route('recruit.index');
    }
    //募集詳細機能
    public function show(Recruit $recruit)
    {
        return view('recruits.show', compact('recruit'));
    }

    //応募機能
    public function apply(Request $request, Recruit $recruit)
    {
        $apply = new Apply();
        $apply->recruitment_id = $recruit->id;
        $apply->apply_user_id = auth()->user()->id;
        $apply->save();

        return redirect()->route('recruit.show', $recruit);
    }

    //応募者一覧機能
    // public function applicants(Recruit $recruit)
    // {
    //     $applicants = $recruit->applies;

    //     return view('recruits.applicants', compact('recruit', 'applicants'));
    // }

    //マッチング機能
    public function match(Request $request, Recruit $recruit, Apply $applicant)
    {
        $matching = new Matching();
        $matching->from_user_id = $recruit->from_user_id;
        $matching->to_user_id = $applicant->apply_user_id;
        $matching->save();

        // 応募を削除して、他のユーザーが同じ募集に応募できなくする
        $recruit->delete();

        return redirect()->route('recruit.applicants', $recruit);
    }

    // my募集一覧

    public function myRecruits()
    {
        $recruits = Recruit::where('from_user_id', auth()->id())->get();
        // dd($recruits);
        return view('recruits.my_recruits', compact('recruits'));
    }
}