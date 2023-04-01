
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
<body>
<div id="nav-container" class="fixed inset-0 bg-white opacity-0 pointer-events-none z-50 transition-all">
        <div class="flex flex-col items-center justify-center h-full space-y-4">
            <button id="close-nav-btn" class="absolute top-0 right-0 mt-4 mr-4 text-indigo-600 hover:text-indigo-500 focus:outline-none">
                <i class="fas fa-times"></i>
            </button>            
            <a href="{{ route('change-email') }}" class="text-2xl font-bold">メールアドレス変更</a>
            <form action="{{ route('logout') }}" method="POST" class="logout-form hidden">
                @csrf
            </form>
            <a href="#" class="text-2xl font-bold logout-button">ログアウト</a>
            
            <a href="{{ route('delete-account-page') }}" class="text-2xl font-bold">退会について</a>

        </div>
    </div>
    
    <header class="bg-white shadow">
        <nav class="container mx-auto px-6 py-4">
            <div class="flex items-center justify-between">
                <div class="hidden md:flex items-center">
                    <div class="text-xl font-semibold text-gray-700">
                        <a href="/">
                            <img src="{{ asset('images/header-logo.png') }}" alt="サウナふれんず" class="h-10">
                        </a>
                        
                    </div>
                    <div class="flex space-x-4 ml-4">
                        <a href="{{ route('recruit.my-recruits') }}" class="{{ Request::routeIs('recruit.my-recruits') ? 'active-link' : '' }} text-indigo-600 hover:text-indigo-500">募集</a>
                        <a href="{{ route('recruit.index') }}" class="{{ Request::routeIs('recruit.index') ? 'active-link' : '' }} text-indigo-600 hover:text-indigo-500">探す</a>
                        <a href="{{ route('rooms.index') }}" class="{{ Request::routeIs('rooms.index') ? 'active-link' : '' }} text-indigo-600 hover:text-indigo-500">メッセージ</a>
                        <a href="{{ route('edit', ['id' => auth()->user()->id]) }}" class="{{ Request::routeIs('edit') ? 'active-link' : '' }} text-indigo-600 hover:text-indigo-500">マイページ</a>
                    </div>                    
                </div>
                <div class="text-xl font-semibold text-gray-700 md:hidden">
                    <a href="/">
                        <img src="{{ asset('images/header-logo.png') }}" alt="サウナふれんず" class="h-10">
                    </a>
                </div>
                <button id="settings-btn" class="text-indigo-600 hover:text-indigo-500 focus:outline-none ml-auto">
                    <i class="fas fa-cog"></i>
                </button>
            </div>
        </nav>
    </header>
    

    <!-- The rest of the page content -->

    <div class="fixed bottom-0 w-full bg-white shadow md:hidden bottom-nav-container">
        <nav class="container mx-auto">
            <div class="flex justify-around items-center">
                <a href="{{ route('recruit.my-recruits') }}" class="{{ Request::routeIs('recruit.my-recruits') ? 'active-nav-button' : '' }} bottom-nav-button text-white hover:text-white bottom-nav-divider">募集</a>
                <a href="{{ route('recruit.index') }}" class="{{ Request::routeIs('recruit.index') ? 'active-nav-button' : '' }} bottom-nav-button text-white hover:text-white bottom-nav-divider">探す</a>
                <a href="{{ route('rooms.index') }}" class="{{ Request::routeIs('rooms.index') ? 'active-nav-button' : '' }} bottom-nav-button text-white hover:text-white bottom-nav-divider">メッセージ</a>
                <a href="{{ route('edit', ['id' => auth()->user()->id]) }}" class="{{ Request::routeIs('edit') ? 'active-nav-button' : '' }} bottom-nav-button text-white hover:text-white">マイページ</a>
            </div>
        </nav>
    </div>

    <script>
        document.querySelector('.logout-button').addEventListener('click', function (e) {
            e.preventDefault();
            const confirmed = confirm('ログアウトしますか？');
            if (confirmed) {
                document.querySelector('.logout-form').submit();
            }
        });
    </script>
    </body>
    </html>
    

    