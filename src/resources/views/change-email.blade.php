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
                    <h2 class="text-gray-900 text-lg font-medium title-font mb-5">メールアドレス変更</h2>

                    <form action="/email" method="POST">
                        {{ csrf_field() }}

                        <!-- New Email Address -->
                        <div class="relative mb-4">
                            <label for="new_email" class="leading-7 text-sm text-gray-600">新規メールアドレスを入力してください</label>
                            <input type="email" id="new_email" name="new_email" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" required>
                        </div>

                        <div class="flex flex-col items-center mt-4">
                            <div class="text-center mb-2">
                                <input style="background-color: #89CFF0; width: 200px;" class="text-white border-0 py-2 focus:outline-none hover:bg-blue-400 rounded text-lg relative z-10" type="submit" value="変更">
                            </div>
                        </div>
                    </form>
                </div>  
            </div>
        </section>
    </div>
</body>
</html>
