<div class="container">
    <h1>{{ $recruit->headline }} - 応募者一覧</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ユーザー名</th>
                <th>アクション</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($applicants as $applicant)
                <tr>
                    <td>{{ $applicant->user->name }}</td>
                    <td>
                        <form action="{{ route('recruit.match', [$recruit, $applicant]) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary">マッチング</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>