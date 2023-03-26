

{{-- @section('content') --}}
    <div class="container">
        <h1>募集一覧</h1>

        <table class="table">
           
            <tbody>
                @foreach ($recruits as $recruit)
                    <tr>
                        <td>
                            @if ($recruit->user)
                            <a href="{{ route('user.profile', $recruit->user->id) }}">
                            <x-user_icon :imgPath="isset($recruit->user->img_path) ? $recruit->user->img_path : ''" :name="$recruit->user->name" />
                        @else
                            <x-user_icon imgPath="" name="未登録ユーザー" />
                        @endif
                        </td>
                        <td>募集タイトル:{{ $recruit->headline }}</td>
                        <td>サウナ施設名:{{ $recruit->facility }}</td>
                        <td>サ飯待ち合わせ時間{{ $recruit->meeting_time }}</td>
                        <td>募集内容:{{ $recruit->recruitment_contents }}</td>
                        <td>{{ $recruit->created_at }}</td>
                        <td>{{ $recruit->updated_at }}</td>
                        <td>
                            @if($recruit->is_matched())
                            <p class="text-danger">この募集は既にマッチングが成立しています。</p>
                        @else
                            <p class="text-success">マッチング待ち</p>
                        @endif
                        </td>
                        <td>
                            {{-- 詳細ページリンク --}}
                            <a href="{{ route('recruit.show', $recruit) }}" class="btn btn-primary">詳細</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('recruit.create') }}" class="btn btn-primary">新規作成</a>
    </div>
{{-- @endsection --}}