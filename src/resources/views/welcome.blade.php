<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <style>
            body {
                font-family: 'Nunito', sans-serif;
                background-image: url('/images/background2.jpg');
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
                min-height: 100vh;
                position: relative;
            }
            /* スマホサイズになった場合に適用するスタイル */
            @media only screen and (max-width: 767px) {
                body {
                    background-image: url('/images/sp-background.jpg'); /* スマホ用の背景画像に変更 */
                    background-size: cover;
                    background-repeat: no-repeat;
                    background-position: center center;
                }
                .buttons-container { /* 追加 */
                    flex-direction: column;
                }
                .button:not(:first-child) { /* 追加 */
                    margin-top: 10px;
                }
            }
            .button {
                background-color: #89CFF0;
                padding: 10px 40px;
                border-radius: 5px;
                text-decoration: none;
                font-weight: 600;
                transition: background-color 0.3s;
            }
            .button:hover {
                background-color: #5fb6de;
            }
            .buttons-container {
                position: absolute;
                bottom: 10%;
                left: 50%;
                transform: translateX(-50%);
                display: flex; /* 追加 */
                justify-content: center; /* 追加 */
                gap: 3rem; /* 追加 */
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="buttons-container">
            @auth
                <a href="{{ url('/dashboard') }}" class="button">アプリへ戻る</a>
            @else
                <a href="{{ route('login') }}" class="button">ログイン</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="button">会員登録</a>
                @endif
            @endauth
        </div>
    </body>
</html>

