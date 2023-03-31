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
            max-width: 500px; /* フォームの最大幅を400pxに設定 */
            margin: 0 auto; /* 画面の中央に配置 */
            padding-top: 100px; /* 画面上部からの余白を100pxに設定 */
        }
    
        .login-form {
            background-color: #F3F4F6; /* 背景色を設定 */
            padding: 40px; /* フォーム内側の余白を設定 */
            border-radius: 12px; /* 角を丸くする */
        }
    </style>
</head>
<body class="antialiased">
    <div class="login-container">
        <section class="text-gray-600 body-font">
            <div class="flex flex-wrap items-center justify-center">
                <div class="login-form">
                    <div class=" md:w-3/4 sm:w-full bg-gray-100 rounded-lg p-4 flex flex-col mx-auto mt-10">

                    <h2 class="text-gray-900 text-lg font-medium title-font mb-5">ログイン</h2>
                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Email Address -->
                        <div class="relative mb-4">
                            <label for="email" class="leading-7 text-sm text-gray-600">メールアドレス</label>
                            <input type="email" id="email" name="email" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" :value="old('email')" required autofocus>
                        </div>

                        <!-- Password -->
                        <div class="relative mb-4">
                            <label for="password" class="leading-7 text-sm text-gray-600">パスワード</label>
                            <input id="password" class="block mt-1 w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" type="password" name="password" required autocomplete="current-password">
                        </div>

                        <div class="block mt-4">
                            <label for="remember_me" class="inline-flex items-center">
                                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                            </label>
                        </div>
                        
                        <div class="flex flex-col items-center mt-4">
                            <div class="text-center mb-2">
                                <button style="background-color: #89CFF0; width: 200px;" class="text-white border-0 py-2 focus:outline-none hover:bg-blue-400 rounded text-lg relative z-10"> <!-- width を style 属性に追加 -->
                                    {{ __('Log in') }}
                                </button>
                            </div>
                            @if (Route::has('password.request'))
                                <a class="underline text-sm text-gray-600 hover:text-gray-900 text-center" href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                            @endif
                        </div>
                        
                        
                        
                    </form>
                </div>
            </div>
        </section>
    </div>
</body>
</html>