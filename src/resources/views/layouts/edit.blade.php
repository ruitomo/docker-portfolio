<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profile Edit</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        .profile-form {
            background-color: #f3f4f6;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
            width: 100%;
            max-width: 600px;
            margin-bottom: 30px;
        }
        .icon-image {
            border-radius: 50%;
            width: 100px;
            height: 100px;
            object-fit: cover;
        }

        input[type="text"],
        input[type="date"],
        input[type="file"],
        label {
            margin-bottom: 15px;
        }

    </style>
</head>
<body class="antialiased">
    <x-navbar />
    <div class="profile-container">
        <section class="text-gray-600 body-font">
            <div class="flex flex-wrap items-center justify-center">
                <div class="profile-form">
                    <h2 class="text-gray-900 text-lg font-medium title-font mb-5">プロフィール編集</h2>
                    <form action="/user/update/{{ $form->id }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $form->id }}" />
                        <x-user_icon :imgPath="$form->img_path" :name="$form->name" />
                          <hr style="margin-top: 16px; margin-bottom: 16px; border-width: 2px;"> 
                        <p>名前</p>
                        <input type="text" name="name" value="{{ $form->name }}" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" />
                        <p>アイコン画像変更</p>
                        <div class="flex items-center">
                            @if ($form->img_path)
                                <img src="{{ asset($form->img_path) }}" alt="アイコン画像" class="icon-image mr-4">
                            @endif
                            <input type="file" name="icon_image" class="border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                        <p>性別</p>
                          <label><input type="radio" name="gender" value="male" {{ $form->gender === 'male' ? 'checked' : '' }}>男性</label>
                          <label><input type="radio" name="gender" value="female" {{ $form->gender === 'female' ? 'checked' : '' }}>女性</label>
                          <label><input type="radio" name="gender" value="unknown" {{ $form->gender === 'unknown' ? 'checked' : '' }}>不明</label>
                        <p>生年月日</p>
                        <input type="date" name="birthday" value="{{ $form->birthday }}" class="bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" /><br />
                        <p>自己紹介</p>
                        <input type="text" name="introduction" value="{{ $form->introduction }}" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" /><br />
                        <p>住居地</p>
                        <input type="text" name="residence" value="{{ $form->residence }}" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" /><br />
                        <p>職業</p>
                        <input type="text" name="job" value="{{ $form->job }}" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" /><br />
                        <p>ホームサウナ</p>
                        <input type="text" name="homesauna" value="{{ $form->homesauna }}" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" /><br />
                        <p>好きなアウフギーサー</p>
                        <input type="text" name="aufguss" value="{{ $form->aufguss }}" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" /><br />
                        <p>行ってみたいサウナ</p>
                        <input type="text" name="gosauna" value="{{ $form->gosauna }}" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" /><br />
                        <p>持ってるサウナハット</p>
                        <input type="text" name="saunahat" value="{{ $form->saunahat }}" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" /><br />
                        <p>趣味</p>
                        <input type="text" name="hobby" value="{{ $form->hobby }}" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" /><br />
                        <p>サウナルーティン</p>
                        <input type="text" name="routine" value="{{ $form->routine }}" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" /><br />
                        <button type="submit" style="background-color: #89CFF0; width: 200px; display: block; margin: 0 auto;" class="text-white border-0 py-2 focus:outline-none hover:bg-blue-400 rounded text-lg relative z-10">
                          更新
                      </button>
                      </form>
                    </div>
                  </div>
        </section>
    </div>
    <script src="{{ asset('js/main.js') }}"></script>
</body>

