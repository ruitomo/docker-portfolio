{{-- @extends('layouts.app')

@section('content') --}}
<div class="container">
    <h1>募集新規登録</h1>

    <form method="POST" action="{{ route('recruit.store') }}">
        @csrf
        <div class="form-group">
            <label for="headline">募集タイトル</label>
            <input type="text" name="headline" id="headline" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label for="facility">サウナ施設名</label>
            <input type="text" name="facility" id="facility" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="meeting_time">サ飯待ち合わせ時間</label>
            <input type="datetime-local" name="meeting_time" id="meeting_time" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="recruitment_contents">募集内容</label>
            <textarea name="recruitment_contents" id="recruitment_contents" class="form-control" rows="5" required></textarea>
        </div>
        {{-- <div class="form-group">
            <label for="capacity">募集人数</label>
            <input type="number" name="capacity" id="capacity" class="form-control" required>
        </div> --}}
        <button type="submit" class="btn btn-primary">登録</button>
    </form>
</div>
{{-- @endsection --}}
