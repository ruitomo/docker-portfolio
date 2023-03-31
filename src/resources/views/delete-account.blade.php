<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>退会画面</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        .delete-account-container {
            max-width: 500px;
            margin: 0 auto;
            padding-top: 100px;
        }

        .delete-account-form {
            background-color: #F3F4F6;
            padding: 40px; /* フォーム内側の余白を40pxに設定 */
            border-radius: 12px;
        }
    </style>
</head>
<body class="antialiased">
    <div class="delete-account-container">
        <section class="text-gray-600 body-font">
            <div class="flex flex-wrap items-center justify-center">
                <div class="delete-account-form">
                    <h2 class="text-gray-900 text-lg font-medium title-font mb-5">退会について</h2>

                    <p class="mb-4">サウナフレンズのアカウントを削除すると、これまでマッチングやメッセージ等の全てのデータが完全に削除され、その後復元することができなくなります。</p>
                    <p class="mb-8">上記の旨をご了承の上、下記ボタンより退会をしてください。</p>

                    <form action="{{ route('delete-account') }}" method="POST" class="text-center">
                        @csrf
                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">退会する</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
</body>
</html>
