<div class="container">
    <h1>Messages</h1>
    <div>
        @foreach ($messages as $message)
            <div>
                <strong>{{ $message->from_user->name }}</strong>: {{ $message->body }}
            </div>
        @endforeach
    </div>
    <form action="{{ route('messages.store', $room->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="body">Message</label>
            <textarea name="body" id="body" class="form-control" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Send</button>
    </form>
</div>
