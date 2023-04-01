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
    <x-navbar />
    <div class="container mx-auto mt-10">
        <h1 class="text-3xl mb-6">Messages</h1>
        <div class="bg-white shadow-md rounded-md p-4 mb-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <div class="mr-4">
                        @if (!empty($room->user->img_path))
                            <img src="{{ asset($room->user->img_path) }}" alt="{{ $room->user->name }}'s profile image" width="40" height="40" style="border-radius: 50%" class="rounded-full" />
                        @else
                            <img src="{{ asset('images/default-avatar.png') }}" alt="Default profile image" width="40" height="40" style="border-radius: 50%" class="rounded-full" />
                        @endif
                    </div>
                    <div class="flex flex-col">
                        <a href="{{ route('recruit.watch-show', $room->recruit->id) }}" class="text-gray-800 font-semibold">
                            @if ($room->recruit)
                                {{ mb_strlen($room->recruit->headline) > 10 ? mb_substr($room->recruit->headline, 0, 10) . '...' : $room->recruit->headline }}
                            @else
                                Room {{ $room->id }}
                            @endif
                            <span>募集詳細</span>
                        </a>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <span class="text-gray-500 text-xs">
                        @if ($room->latestMessage)
                            {{ $room->latestMessage->created_at->diffForHumans() }}
                        @else
                            Not updated
                        @endif
                    </span>
                </div>
            </div>
        </div>
        <div class="bg-white shadow-md rounded-md p-4 mb-4">
            <div class="space-y-6">
                @foreach ($messages as $message)
                <div class="flex @if ($message->from_user->id == auth()->id()) justify-end @else justify-start @endif">
                    <div class="flex items-start">
                        <div class="user-icon mr-2 relative overflow-hidden" style="width: 40px; height: 40px;">
                            @if (!empty($message->from_user->img_path))
                                <a href="{{ route('user.profile', $message->from_user->id) }}">
                                    <div style="background-image: url('{{ asset($message->from_user->img_path) }}'); background-position: center; background-repeat: no-repeat; background-size: cover; width: 40px; height: 40px;" class="rounded-full absolute"></div>
                                </a>
                            @else
                                <a href="{{ route('user.profile', $message->from_user->id) }}">
                                    <div style="background-image: url('{{ asset('images/default-avatar.png') }}'); background-position: center; background-repeat: no-repeat; background-size: cover; width: 40px; height: 40px;" class="rounded-full absolute"></div>
                                </a>
                            @endif
                        </div>
                        
                        <div class="@if ($message->from_user->id == auth()->id()) bg-blue-500 text-white rounded-l-lg rounded-tr-lg @else bg-gray-200 text-gray-800 rounded-r-lg rounded-tl-lg @endif inline-block py-2 px-4" style="max-width: calc(100% - 50px);">
                            <div class="text-xs mb-1" style="white-space: nowrap;">
                                {{ $message->from_user->name }}
                                <span class="@if ($message->from_user->id == auth()->id()) text-blue-200 @else text-gray-500 @endif">　　送信: {{ $message->created_at->format('H:i') }}</span>
                            </div>
                            {{ $message->body }}
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <form action="{{ route('messages.store', $room->id) }}" method="POST" class="bg-white shadow-md rounded-md p-4">
            @csrf
            <div class="mb-4">
                <label for="body" class="block text-gray-700 text-sm font-semibold mb-2">Message</label>
                <textarea name="body" id="body" class="form-control w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none" rows="3"></textarea>
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">Send</button>
        </form>
    </div>
    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>



