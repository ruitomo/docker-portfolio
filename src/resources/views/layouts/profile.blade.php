<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profile Details</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        .profile-container {
            max-width: 800px;
            margin: 0 auto;
            padding-top: 50px;
        }

        .profile-details {
            background-color: #F3F4F6;
            padding: 40px;
            border-radius: 12px;
        }

        .icon-image {
            border-radius: 50%;
            width: 70px;
            height: 70px;
            object-fit: cover;
        }

        .user-icon {
        display: flex;
        align-items: center;
        }
    </style>
</head>
<body class="antialiased">
    <div class="profile-container">
        <section class="text-gray-600 body-font">
            <div class="flex flex-wrap items-center justify-center">
                <div class="profile-details">
                    <h2 class="text-gray-900 text-lg font-medium title-font mb-5">プロフィール詳細</h2>
                    <div class="user-icon">
                        @if (!empty($user->img_path))
                            <img src="{{ asset($user->img_path) }}" alt="{{ $user->name }}'s profile image" class="icon-image" />
                        @else
                            <img src="{{ asset('images/default-avatar.png') }}" alt="Default profile image" class="icon-image" />
                        @endif
                        <span>{{ $user->name }}</span>
                    </div>
                    <hr style="margin-top: 16px; margin-bottom: 16px; border-width: 2px;">
                    <p>名前: {{ $user->name }}</p>
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
                </div>
            </div>
        </section>
    </div>
</body>
</html>
