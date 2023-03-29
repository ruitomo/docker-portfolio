<?php

namespace App\Http\Controllers;

use App\Models\Recruit;
use Illuminate\Http\Request;
use App\Models\Apply;
use App\Models\Matching;
use App\Models\Room;

class RecruitController extends Controller
{
    // 募集一覧
    public function index(Request $request)
    {
        $search = $request->input('search');

        $recruits = Recruit::with('user', 'matching');

        if ($search) {
            $recruits->where(function ($query) use ($search) {
                $query->where('headline', 'like', '%' . $search . '%')
                    ->orWhere('facility', 'like', '%' . $search . '%')
                    ->orWhere('recruitment_contents', 'like', '%' . $search . '%');
            });
        }

        $recruits = $recruits->get();

        return view('recruits.index', compact('recruits'));
    }
    // 募集新規登録画面
    public function create()
    {
        return view('recruits.create');
    }
    // 募集新規登録
    public function store(Request $request)
    {


        $data = $request->all();
        $data['from_user_id'] = auth()->id();

        Recruit::create($data);

        return redirect()->route('recruit.my-recruits');
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

        return redirect()->route('recruit.my-recruits');
    }
    //募集詳細機能
    public function show(Recruit $recruit)
    {
        return view('recruits.show', compact('recruit'));
    }



    public function apply(Request $request, Recruit $recruit)
    {

        // マッチング確認
        $matchingExists = Matching::where('to_user_id', $recruit->from_user_id)
            ->where('recruit_id', $recruit->id)
            ->exists();


        // マッチングテーブルにデータを追加
        $matching = Matching::create([
            'from_user_id' => auth()->id(),
            'to_user_id' => $recruit->from_user_id,
            'recruit_id' => $recruit->id,
        ]);

        // ルームテーブルにデータを追加
        $room = Room::create([
            'from_user_id' => auth()->id(),
            'to_user_id' => $recruit->from_user_id,
        ]);

        // // 募集データにroom_idを追加
        // $recruit->update(['room_id' => $room->id]);
        // Recruitインスタンスにroom_idを設定して保存
        $recruit->room_id = $room->id;
        $recruit->save();

        // リダイレクト
        return redirect()->route('messages.index', $room->id);
    }


    // my募集一覧

    public function myRecruits()
    {
        $recruits = Recruit::where('from_user_id', auth()->id())->get();
        // dd($recruits);
        return view('recruits.my_recruits', compact('recruits'));
    }
}