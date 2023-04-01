<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>募集詳細</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>
<body class="antialiased">
    <x-navbar />
    <div class="recruit-container">
        <section class="text-gray-600 body-font">
            <div class="container px-5 py-24 mx-auto">

                @php
                $now = Carbon\Carbon::now();
                $updatedAt = Carbon\Carbon::parse($recruit->updated_at);
                $diffForHumans = $updatedAt->diffForHumans($now);
                @endphp

                <div class="border border-gray-200 p-6 rounded-lg bg-gray-100 custom-line-height">
                    <div class="flex justify-between items-center" style="margin-bottom: 3px;">
                        <div class="flex items-center">
                            @if ($recruit->user)
                                {{-- <a href="{{ route('user.profile', $recruit->user->id) }}"> --}}
                                    <x-user_icon :imgPath="isset($recruit->user->img_path) ? $recruit->user->img_path : ''" :name="$recruit->user->name" :route="route('user.profile', $recruit->user->id)" />
                            @else
                                <x-user_icon imgPath="" name="未登録ユーザー" />
                            @endif
                        </div>
                        <span class="text-gray-500">{{ $diffForHumans }}</span>
                    </div>
                    
                    <div class="border border-gray-200 p-6 rounded-lg bg-gray-100 custom-line-height" style="background-color: #F0F0F0";>
                     
                            <h2 class="text-lg text-gray-900 font-medium title-font mb-2 ml-4" style="font-size: 24px;">{{ $recruit->headline }}</h2>
                            <!-- Error message -->
                    @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                            <p class="leading-relaxed text-base">サウナ施設名: {{ $recruit->facility }}</p>
                            <p class="leading-relaxed text-base">サ飯待ち合わせ時間: {{ $recruit->meeting_time }}</p>
                            <p class="leading-relaxed text-base">募集内容: {{ $recruit->recruitment_contents }}</p>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
