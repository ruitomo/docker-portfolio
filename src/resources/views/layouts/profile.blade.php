{{-- @extends('layouts.app') @section('content') --}}
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">ユーザ編集</div>
        <div class="card-body">
          <!-- 重要な箇所ここから -->
          {{-- {{ route('profile.update') }} --}}
          {{-- <form action=""
            method="post">
            @csrf

            <input type="hidden" name="id" value="{{ $user->id }}" />
            <p>名前:{{ $user->name }}</p>
            <p>アイコン画像:{{ $user->img_path }}</p>
            <p>性別:{{ $user->gender }}</p>
            <p>生年月日:{{ $user->birthday }}</p>
            <p>住んでる都道府県:{{ $user->residence }}</p>
            <p>職業:{{ $user->job }}</p>
            <p>ホームサウナ:{{ $user->homesauna }}</p>
            <p>好きなアウフギーサー:{{ $user->aufguss }}</p>
            <p>行ってみたいサウナ:{{ $user->gosauna }}</p>
            <p>持ってるサウナハット:{{ $user->saunahat }}</p>
            <p>趣味:{{ $user->hobby }}</p>
            <p>サウナルーティン:{{ $user->routine }}</p>
            <p>自己紹介:{{ $user->introduction }}</p>
            <a href="('edit')">編集する</a>
          </form> --}}
          <form action="/layouts/profile."
            method="post">
            @csrf

            {{-- <input type="hidden" name="id" value="{{ $user->id }}" /> --}}
            <p>名前:<input type="text" name="name" value="{{ old('name') }}"></p>
            <p>アイコン画像:<input type="text" name="name" value="{{ old('img_path') }}"></p>
            <p>性別:<input type="text" name="name" value="{{ old('gender') }}"></p>
            <p>生年月日:<input type="text" name="name" value="{{ old('birthday') }}"></p>
            <p>住んでる都道府県:<input type="text" name="name" value="{{ old('residence') }}"></p>
            <p>職業:<input type="text" name="name" value="{{ old('job') }}"></p>
            <p>ホームサウナ:<input type="text" name="name" value="{{ old('homesauna') }}"></p>
            <p>好きなアウフギーサー:<input type="text" name="name" value="{{ old('aufguss') }}"></p>
            <p>行ってみたいサウナ:<input type="text" name="name" value="{{ old('gosauna') }}"></p>
            <p>持ってるサウナハット:<input type="text" name="name" value="{{ old('saunahat') }}"></p>
            <p>趣味:<input type="text" name="name" value="{{ old('hobby') }}"></p>
            <p>サウナルーティン:<input type="text" name="name" value="{{ old('routine') }}"></p>
            <p>自己紹介:<input type="text" name="name" value="{{ old('introduction') }}"></p>
            <a href="('edit')">編集する</a>
          </form>
          <!-- 重要な箇所ここまで -->
        </div>
      </div>
    </div>
  </div>
</div>
{{-- @endsection --}}