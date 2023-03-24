<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>

                <div class="card-body">
                    新規メールアドレスを入力してください
                    <form action="/email" method="POST">
                        {{ csrf_field() }}
                        <input type="email" name="new_email">
                        <input type="submit">
                    </form>
                </div>
                <div>
                    <a href="{{ route('recruit.my-recruits') }}" class="btn btn-primary">募集</a>
                    <a href="{{ route('recruit.index') }}" class="btn btn-primary">探す</a>
                    <a class="nav-link" href="{{ route('rooms.index') }}">メッセージ</a>
                    <a href="{{ route('edit', ['id' => auth()->user()->id]) }}" class="btn btn-primary">マイページ</a>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
