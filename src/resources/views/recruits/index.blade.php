@php
    use Carbon\Carbon;
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>
<body class="antialiased">
    <div class="recruit-container">
        <section class="text-gray-600 body-font">
            <div class="container px-5 py-24 mx-auto">
                <div class="title-container">
                    <h1 class="text-6xl font-medium title-font mb-2 text-gray-900" style="font-size: 48px;">探す</h1>
                </div>
               
                <div class="form-container">
                    <form action="{{ route('recruit.index') }}" method="get" class="search-form">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="検索キーワード" value="{{ request('search') }}">
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-primary">検索</button>
                                <a href="{{ route('recruit.index') }}" class="btn btn-secondary">リセット</a>
                            </span>
                        </div>
                    </form>
                    <div class="mt-4 button-container">
                        <a href="{{ route('recruit.create') }}" style="background-color: #89CFF0;" class="text-white border-0 py-2 focus:outline-none hover:bg-blue-400 rounded text-lg relative z-10">新規作成</a>
                    </div>
                </div>
                <div class="grid grid-cols-1 gap-6">
                    @foreach ($recruits as $recruit)
                    @php
                    $now = Carbon::now();
                    $updatedAt = Carbon::parse($recruit->updated_at);
                    $diffForHumans = $updatedAt->diffForHumans($now);
                    @endphp
                    <div class="border border-gray-200 p-6 rounded-lg bg-gray-100 custom-line-height">
                        <p class="status-text">
                            @if($recruit->is_matched())
                                <span class="text-danger">この募集は既にマッチングが成立してます</span>
                            @else
                                <span class="text-success">マッチング待ち</span>
                            @endif
                        </p>
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
                            <p class="leading-relaxed text-base">サウナ施設名: {{ $recruit->facility }}</p>
                            <p class="leading-relaxed text-base">サ飯待ち合わせ時間: {{ $recruit->meeting_time }}</p>
                            <p class="leading-relaxed text-base">募集内容: {{ $recruit->recruitment_contents }}</p>
                            <p class="leading-relaxed text-base">作成日時: {{ $recruit->created_at }}</p>
                            <p class="leading-relaxed text-base">更新日時: {{ $recruit->updated_at }}</p>
                                                    
                            <div class="mt-4 button-container">
                                <a href="{{ route('recruit.show', $recruit) }}" style="background-color: #89CFF0;" class="text-white border-0 py-2 focus:outline-none hover:bg-blue-400 rounded text-lg relative z-10">詳細</a>
                            </div>
                        </div>
                    </div>
                @endforeach

                </div>
            </div>
        </section>
    </div>
                            
</body>
</html>
