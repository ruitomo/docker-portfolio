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
            padding: 40px; /* フォーム内側の余白を40pxに設定 */
            border-radius: 12px;
        }
    </style>
</head>
<body class="antialiased">
    <div class="login-container">
        <section class="text-gray-600 body-font">
            <div class="flex flex-wrap items-center justify-center">
                <div class="login-form">
                    <h2 class="text-gray-900 text-lg font-medium title-font mb-5">会員登録</h2>

                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <!-- Name -->
                        <div class="relative mb-4">
                            <label for="name" class="leading-7 text-sm text-gray-600">名前</label>
                            <input type="text" id="name" name="name" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" :value="old('name')" required autofocus>
                        </div>

                        <!-- Email Address -->
                        <div class="relative mb-4">
                            <label for="email" class="leading-7 text-sm text-gray-600">メールアドレス</label>
                            <input type="email" id="email" name="email" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" :value="old('email')" required>
                        </div>

                        <!-- Password -->
                        <div class="relative mb-4">
                            <label for="password" class="leading-7 text-sm text-gray-600">パスワード</label>
                            <input id="password" class="block mt-1 w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"type="password"
                            name="password"
                            required autocomplete="new-password">
                        </div>

                        <!-- Confirm Password -->
                        <div class="relative mb-4">
                            <label for="password_confirmation" class="leading-7 text-sm text-gray-600">パスワードの確認</label>
                            <input id="password_confirmation" class="block mt-1 w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                type="password"
                                name="password_confirmation" required>
                        </div>

                        <div class="flex flex-col items-center mt-4">
                            <div class="text-center mb-2">
                                <button style="background-color: #89CFF0; width: 200px;" class="text-white border-0 py-2 focus:outline-none hover:bg-blue-400 rounded text-lg relative z-10"> 
                                    {{ __('Register') }}
                                </button>
                            </div>
                            @if (Route::has('password.request'))
                                <a class="underline text-sm text-gray-600 hover:text-gray-900 text-center" href="{{ route('login') }}">
                                    {{ __('Already registered?') }}
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
