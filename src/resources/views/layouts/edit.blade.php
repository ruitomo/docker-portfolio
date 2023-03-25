{{-- @extends('layouts.app') @section('content') --}}
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">ユーザ編集</div>
        <div class="card-body">
          <!-- 重要な箇所ここから -->
          {{-- {{ route('profile.update') }} --}}
          <x-user_icon :imgPath="$form->img_path" :name="$form->name" />

          <form action="/user/update/{{ $form->id }}" method="post" enctype="multipart/form-data">

            @csrf

            <input type="hidden" name="id" value="{{ $form->id }}" />
            <p>名前</p>
            <input type="text" name="name" value="{{ $form->name }}" />
            <p>アイコン画像</p>
            <input type="file" name="icon_image">
            @if ($form->img_path)
            <img src="{{ asset($form->img_path) }}" alt="アイコン画像">
          @endif
            <p>性別</p>
              <label><input type="radio" name="gender" value="male" {{ $form->gender === 'male' ? 'checked' : '' }}>男性</label>
              <label><input type="radio" name="gender" value="female" {{ $form->gender === 'female' ? 'checked' : '' }}>女性</label>
              <label><input type="radio" name="gender" value="unknown" {{ $form->gender === 'unknown' ? 'checked' : '' }}>不明</label>
            <p>生年月日</p>
            <input type="date" name="birthday" value="{{ $form->birthday }}" /><br />
            <p>自己紹介</p>
            <input type="text" name="introduction" value="{{ $form->introduction }}" /><br />
            <p>住居地</p>
            <input type="text" name="residence" value="{{ $form->residence }}" /><br />
            <p>職業</p>
            <input type="text" name="job" value="{{ $form->job }}" /><br />
            <p>ホームサウナ</p>
            <input type="text" name="homesauna" value="{{ $form->homesauna }}" /><br />
            <p>好きなアウフギーサー</p>
            <input type="text" name="aufguss" value="{{ $form->aufguss }}" /><br />
            <p>行ってみたいサウナ</p>
            <input type="text" name="gosauna" value="{{ $form->gosauna }}" /><br />
            <p>持ってるサウナハット</p>
            <input type="text" name="saunahat" value="{{ $form->saunahat }}" /><br />
            <p>趣味</p>
            <input type="text" name="hobby" value="{{ $form->hobby }}" /><br />
            <p>サウナルーティン</p>
            <input type="text" name="routine" value="{{ $form->routine }}" /><br />
            <input type="submit" value="更新">
          </form>
          <!-- 重要な箇所ここまで -->
        </div>
      </div>
    </div>
  </div>
</div>
{{-- @endsection --}}