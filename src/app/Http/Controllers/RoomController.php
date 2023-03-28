<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use App\Models\Matching;
use App\Models\Recruit;

class RoomController extends Controller
{
    public function index()
    {
        $user_id = auth()->id();
        $rooms = Room::with(['recruit', 'user', 'latestMessage'])
            ->where('from_user_id', $user_id)
            ->orWhere('to_user_id', $user_id)
            ->get();


        return view('rooms.index', compact('rooms'));
    }



    public function destroy(Room $room)
    {
        // マッチングデータ削除
        $matching = Matching::where('from_user_id', $room->from_user_id)
            ->where('to_user_id', $room->to_user_id)
            ->orWhere(function ($query) use ($room) {
                $query->where('from_user_id', $room->to_user_id)
                    ->where('to_user_id', $room->from_user_id);
            })
            ->first();

        if ($matching) {
            // 募集データ削除
            $recruit = Recruit::where('from_user_id', $matching->from_user_id)
                ->orWhere('from_user_id', $matching->to_user_id)
                ->first();

            if ($recruit) {
                $recruit->delete();
            }

            $matching->delete();
        }

        // ルームデータ削除
        $room->delete();

        return redirect()->route('rooms.index');
    }

    public function matching()
    {
        return $this->hasOne(Matching::class, 'room_id');
    }
}