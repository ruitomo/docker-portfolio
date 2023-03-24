<div class="container">
    <h1>Rooms</h1>
    <ul class="list-group">
        @foreach ($rooms as $room)
        <li class="list-group-item">
            <a href="{{ route('messages.index', $room->id) }}">Room {{ $room->id }}</a>
        </li>
        @endforeach
    </ul>
</div>