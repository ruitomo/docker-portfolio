<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        $user_id = auth()->id();
        $rooms = Room::where('from_user_id', $user_id)
            ->orWhere('to_user_id', $user_id)
            ->get();

        return view('rooms.index', compact('rooms'));
    }
}