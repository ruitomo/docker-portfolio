<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        .login-container {
            max-width: 500px;
            margin: 0 auto;
            padding-top: 100px;
        }

        .login-form {
            background-color: #F3F4F6;
            padding: 40px;
            border-radius: 12px;
        }
    </style>
</head>
<body class="antialiased">
    <div class="login-container">
        <section class="text-gray-600 body-font">
            <div class="flex flex-wrap items-center justify-center">
                <div class="login-form">
                    <h2 class="text-gray-900 text-lg font-medium title-font mb-5">募集編集</h2>
                    <form action="{{ route('recruit.update', $recruit) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="relative mb-4">
                            <label for="headline" class="leading-7 text-sm text-gray-600">募集タイトル</label>
                            <input type="text" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" id="headline" name="headline" value="{{ $recruit->headline }}" required>
                        </div>

                        <div class="relative mb-4">
                            <label for="facility" class="leading-7 text-sm text-gray-600">サウナ施設名</label>
                            <input type="text" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" id="facility" name="facility" value="{{ $recruit->facility }}" required>
                        </div>

                        <div class="relative mb-4">
                            <label for="meeting_time" class="leading-7 text-sm text-gray-600">待ち合わせ時間</label>
                            <input type="text" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" id="meeting_time" name="meeting_time" value="{{ $recruit->meeting_time }}" required>
                        </div>

                        <div class="relative mb-4">
                            <label for="recruitment_contents" class="leading-7 text-sm text-gray-600">募集内容</label>
                            <textarea class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" id="recruitment_contents" name="recruitment_contents" rows="3" required>{{ $recruit->recruitment_contents }}</textarea>
                        </div>

                        <div class="flex flex-col items-center mt-4">
                            <div class="text-center mb-2">
                                <button style="background-color: #89CFF0; width: 200px;" class="text-white border-0 py-2 focus:outline-none hover:bg-blue-400 rounded text-lg relative z-10">
                                    更新
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
</body>
</html>
