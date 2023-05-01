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
    <style>
        .button-container {
          display: flex;
          justify-content: center;
          align-items: center;
          flex-wrap: wrap;
        }
      
        .button-container button,
        .button-container a {
          width: 200px;
          margin: 0 0.5rem;
          text-align: center;
        }
        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;

        }
        .header-container p {
            margin-bottom: 0;
        }
        .header-container a {
            margin-left: auto;
        }
      
        @media screen and (max-width: 767px) {
          .button-container {
            flex-direction: column;
          }
      
          .button-container button,
          .button-container a {
            margin: 0.5rem 0;
          }

          .header-container p {
            width: 100%;
            margin-bottom: 8px;
            }
            .header-container a {
            margin-left: 0;
            width: 100%;
            }
        }
      </style>
</head>
<body class="antialiased">
  <x-navbar />
    <div class="login-container">
        <section class="text-gray-600 body-font">
            <div class="container px-5 py-24 mx-auto">
              <div class="flex flex-wrap w-full mb-20 flex-col items-center text-center">
                <h1 class="text-6xl font-medium title-font mb-2 text-gray-900" style="font-size: 48px";>my募集一覧</h1>
                <div class="header-container p-6">
                    <p class="leading-relaxed text-gray-500 text-lg">あなたの投稿募集一覧</p>
                    <a href="{{ route('recruit.create') }}" style="background-color: #89CFF0; width: 150px; display: inline-block; text-align: center;" class="text-white border-0 py-2 focus:outline-none hover:bg-blue-400 rounded text-lg relative z-10">新規作成</a>
                  </div>
              </div>
              <div class="grid grid-cols-1 gap-6">
                @forelse ($recruits as $recruit)
                  <div class="border border-gray-200 p-6 rounded-lg bg-gray-100">
                    <h2 class="text-lg text-gray-900 font-medium title-font mb-2">{{ $recruit->headline }}</h2>
                    <p class="leading-relaxed text-base">サウナ施設名: {{ $recruit->facility }}</p>
                    <p class="leading-relaxed text-base">サ飯待ち合わせ時間: {{ $recruit->meeting_time }}</p>
                    <p class="leading-relaxed text-base">募集内容: {{ $recruit->recruitment_contents }}</p>
                    <p class="leading-relaxed text-base">作成日時: {{ $recruit->created_at }}</p>
                    <p class="leading-relaxed text-base">更新日時: {{ $recruit->updated_at }}</p>
                    <div class="mt-4 button-container">
                        <a href="{{ route('recruit.edit', $recruit) }}" style="background-color: #89CFF0;" class="text-white border-0 py-2 focus:outline-none hover:bg-blue-400 rounded text-lg relative z-10">編集</a>
                        <form action="{{ route('recruit.destroy', $recruit) }}" method="POST" style="display: inline-block;">
                          @csrf
                          @method('DELETE')
                          <button type="submit" style="background-color: #89CFF0;" class="text-white border-0 py-2 focus:outline-none hover:bg-blue-400 rounded text-lg relative z-10" onclick="return confirm('本当に削除しますか？my募集を削除すると、この募集でマッチングしたチャットルームも削除されます。');">削除</button>
                        </form>
                      </div>
                      
                  </div>
                  @empty
                  <div class="bg-white shadow-md rounded-md p-4 mb-4">
                      <p class="text-center text-gray-800 font-semibold">あなたが募集したものはありません。募集してみましょう！</p>
                  </div>
                  @endforelse
              </div>
            </div>
          </section>
          
          
    </div>
    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
