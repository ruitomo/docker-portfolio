{{-- @extends('layouts.app')

@section('content') --}}
<div class="container">
    <h1>募集編集</h1>
    <form action="{{ route('recruit.update', $recruit) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="headline">募集タイトル</label>
            <input type="text" class="form-control" id="headline" name="headline" value="{{ $recruit->headline }}" required>
        </div>

        <div class="form-group">
            <label for="facility">サウナ施設名</label>
            <input type="text" class="form-control" id="facility" name="facility" value="{{ $recruit->facility }}" required>
        </div>

        <div class="form-group">
            <label for="meeting_time">待ち合わせ時間</label>
            <input type="text" class="form-control" id="meeting_time" name="meeting_time" value="{{ $recruit->meeting_time }}" required>
        </div>

        <div class="form-group">
            <label for="recruitment_contents">募集内容</label>
            <textarea class="form-control" id="recruitment_contents" name="recruitment_contents" rows="3" required>{{ $recruit->recruitment_contents }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">更新</button>
    </form>
</div>
{{-- @endsection --}}