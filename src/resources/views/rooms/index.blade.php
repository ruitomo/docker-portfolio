<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body class="antialiased bg-gray-100">
    <div class="container mx-auto mt-10">
        <h1 class="text-3xl mb-6">Rooms</h1>
        <ul>
            @foreach ($rooms as $room)
            <li class="bg-white shadow-md rounded-md p-4 mb-4">
                <div class="flex items-center justify-between">
                    <a href="{{ route('messages.index', $room->id) }}" class="flex items-center text-decoration-none">
                        {{-- アイコン表示 --}}
                        <div class="mr-4">
                            @if (!empty($room->user->img_path))
                            <img src="{{ asset('storage/' . $room->user->img_path) }}" alt="{{ $room->user->name }}'s profile image" width="50" height="50" class="rounded-full" />
                            @else
                            <img src="{{ asset('images/default-avatar.png') }}" alt="Default profile image" width="50" height="50" class="rounded-full" />
                            @endif
                        </div>
                        <div class="flex flex-col">
                            <span class="text-gray-800 font-semibold">
                                @if ($room->recruit)
                                {{ $room->recruit->headline }}
                                @else
                                Room {{ $room->id }}
                                @endif
                            </span>
                         
                        </div>
                    </a>
                    <div class="flex items-center space-x-4">
                        <span class="text-gray-500 text-sm">最終更新:
                            @if ($room->latestMessage)
                                {{ $room->latestMessage->created_at->diffForHumans() }}
                            @else
                                まだメッセージはありません
                            @endif
                        </span>
                        
                        

                        <form action="{{ route('rooms.destroy', $room->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-600 text-white px-2 py-1 text-sm rounded">Delete</button>
                        </form>
                    </div>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
</body>

</html>


