<div class="container">
    <h1>{{ $recruit->headline }}</h1>

    <!-- Error message -->
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <p>サウナ施設名: {{ $recruit->facility }}</p>
    <p>サ飯待ち合わせ時間: {{ $recruit->meeting_time }}</p>
    <p>募集内容: {{ $recruit->recruitment_contents }}</p>

    <form action="{{ route('recruit.apply', $recruit->id) }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-primary">応募する</button>
    </form>
    
</div>
