<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>募集新規登録</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
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
        .form-container {
            max-width: 500px;
            margin: 0 auto;
            padding-top: 30px;
        }

        .form-content {
            background-color: #F3F4F6;
            padding: 40px;
            border-radius: 12px;
        }
    </style>
</head>
<body class="antialiased">
    <x-navbar />
    <div class="form-container">
        <section class="text-gray-600 body-font">
            <div class="flex flex-wrap items-center justify-center">
                <div class="form-content">
                    <h2 class="text-gray-900 text-lg font-medium title-font mb-5">募集新規登録</h2>
                    
                    <form method="POST" action="{{ route('recruit.store') }}">
                        @csrf
                        <div class="relative mb-4">
                            <label for="headline" class="leading-7 text-sm text-gray-600">募集タイトル</label>
                            <input type="text" name="headline" id="headline" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" required>
                        </div>
                        
                        <div class="relative mb-4">
                            <label for="facility" class="leading-7 text-sm text-gray-600">サウナ施設名</label>
                            <input type="text" name="facility" id="facility" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" required>
                        </div>
                        <div class="relative mb-4">
                            <label for="meeting_time" class="leading-7 text-sm text-gray-600">サ飯待ち合わせ時間</label>
                            <input type="datetime-local" name="meeting_time" id="meeting_time" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" required>
                        </div>
                        <div class="relative mb-4">
                            <label for="recruitment_contents" class="leading-7 text-sm text-gray-600">募集内容</label>
                            <textarea name="recruitment_contents" id="recruitment_contents" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" rows="5" required></textarea>
                        </div>
                        <div class="flex items-center justify-center mt-4">
                            <button type="submit" style="background-color: #89CFF0; width: 200px;" class="text-white border-0 py-2 focus:outline-none hover:bg-blue-400 rounded text-lg relative z-10">
                                登録
                            </button>
                        </div>
                    </form>
                </div>  
            </div>
        </section>
    </div>
    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>

