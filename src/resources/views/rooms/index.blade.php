<div class="container">
    <h1>Rooms</h1>
    <ul class="list-group">
        @foreach ($rooms as $room)
        <li class="list-group-item">
            <a href="{{ route('messages.index', $room->id) }}">
                {{-- アイコン表示 --}}
                    @if (!empty($room->user->img_path))
                        <img src="{{ asset('storage/' . $room->user->img_path) }}" alt="{{ $room->user->name }}'s profile image" width="50" height="50" />
                    @else
                        <img src="{{ asset('images/default-avatar.png') }}" alt="Default profile image" width="50" height="50" />
                    @endif
                
                @if ($room->recruit)
                    {{ $room->recruit->headline }}
                @else
                    Room {{ $room->id }}
                @endif
            </a>
        </li>
        @endforeach
    </ul>
    
    
</div>
