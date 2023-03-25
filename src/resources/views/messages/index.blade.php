<div class="container">
    <h1>Messages</h1>
    <div>
        @foreach ($messages as $message)
            <div>
                <div class="user-icon">
                    @if (!empty($message->from_user->img_path))
                        <img src="{{ asset($message->from_user->img_path) }}" alt="{{ $message->from_user->name }}'s profile image" width="50" height="50" />
                    @else
                        <img src="{{ asset('images/default-avatar.png') }}" alt="Default profile image" width="50" height="50" />
                    @endif
                    <span><strong>{{ $message->from_user->name }}</strong></span>
                </div>
                {{ $message->body }}
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
