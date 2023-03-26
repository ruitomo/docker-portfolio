{{-- @section('content') --}}
<div class="container">
    <h1>my募集一覧</h1>

    <table class="table">
       
        <tbody>
            @foreach ($recruits as $recruit)
                <tr>
                    <td>募集タイトル:{{ $recruit->headline }}</td>
                    <td>サウナ施設名:{{ $recruit->facility }}</td>
                    <td>サ飯待ち合わせ時間{{ $recruit->meeting_time }}</td>
                    <td>募集内容:{{ $recruit->recruitment_contents }}</td>
                    <td>{{ $recruit->created_at }}</td>
                    <td>{{ $recruit->updated_at }}</td>
                    <td>
                        <a href="{{ route('recruit.edit', $recruit) }}" class="btn btn-primary">編集</a>
                        <form action="{{ route('recruit.destroy', $recruit) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">削除</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('recruit.create') }}" class="btn btn-primary">新規作成</a>
</div>
{{-- @endsection --}}