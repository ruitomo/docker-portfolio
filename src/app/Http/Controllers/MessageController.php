<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Room;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index(Room $room)
    {
        $messages = $room->messages()->with('from_user')->get();

        return view('messages.index', compact('messages', 'room'));
    }

    public function store(Request $request, Room $room)
    {
        $request->validate([
            'body' => 'required|max:500',
        ]);

        $message = new Message($request->all());
        $message->from_user_id = auth()->id();
        $message->to_user_id = $room->to_user_id; // or $room->from_user_id depending on the logic
        $message->body = $request->input('body');
        $message->save();

        return redirect()->route('messages.index', $room->id);
    }
}