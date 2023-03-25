<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">プロフィール</div>
        <div class="card-body">
          <div class="user-icon">
            @if (!empty($user->img_path))
                <img src="{{ asset($user->img_path) }}" alt="{{ $user->name }}'s profile image" width="50" height="50" />
            @else
                <img src="{{ asset('images/default-avatar.png') }}" alt="Default profile image" width="50" height="50" />
            @endif
            <span>{{ $user->name }}</span>
        </div>
          <p>名前: {{ $user->name }}</p>
          <p>アイコン画像: {{ $user->img_path }}</p>
          <p>性別: {{ $user->gender }}</p>
          <p>生年月日: {{ $user->birthday }}</p>
          <p>住んでる都道府県: {{ $user->residence }}</p>
          <p>職業: {{ $user->job }}</p>
          <p>ホームサウナ: {{ $user->homesauna }}</p>
          <p>好きなアウフギーサー: {{ $user->aufguss }}</p>
          <p>行ってみたいサウナ: {{ $user->gosauna }}</p>
          <p>持ってるサウナハット: {{ $user->saunahat }}</p>
          <p>趣味: {{ $user->hobby }}</p>
          <p>サウナルーティン: {{ $user->routine }}</p>
          <p>自己紹介: {{ $user->introduction }}</p>
          {{-- <a href="{{ route('user.edit', $user->from_user_id) }}">編集する</a> --}}
        </div>
      </div>
    </div>
  </div>
</div>
