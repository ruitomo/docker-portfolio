<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Room;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index(Room $room)
    {
        $messages = Message::with('from_user')
            ->where('room_id', $room->id) // この部分を変更
            ->orderBy('created_at', 'asc')
            ->get();

        return view('messages.index', compact('messages', 'room'));
    }


    public function store(Request $request, Room $room)
    {
        $request->validate([
            'body' => 'required|max:500',
        ]);

        $message = new Message($request->all());
        $message->from_user_id = auth()->id();
        $message->to_user_id = ($room->from_user_id === auth()->id()) ? $room->to_user_id : $room->from_user_id;
        $message->body = $request->input('body');
        $message->room_id = $room->id; // room_idを指定
        $message->save();

        return redirect()->route('messages.index', $room->id);
    }
}