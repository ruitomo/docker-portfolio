<div class="container">
    <h1>Rooms</h1>
    <ul class="list-group">
        @foreach ($rooms as $room)
        <li class="list-group-item">
            <a href="{{ route('messages.index', $room->id) }}">
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
