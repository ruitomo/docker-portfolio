@extends('layouts.app')

@section('content')
  <h1>募集する</h1>
  {{-- <a href="/events/create">新規作成</a> --}}
  <form action="/recruit" method="post" enctype="multipart/form-data">

    @csrf

    <input type="hidden" name="id" value="{{ $form->id }}" />
    <p>募集見出し</p>
    <input type="text" name="headline" value="{{ $form->headline }}" />
    <p>サウナ施設名</p>
    <input type="text" name="facility" value="{{ $form->facility }}" /><br />
    <p>自己紹介</p>
    <input type="text" name="introduction" value="{{ $form->introduction }}" /><br />
    <p>サ飯待ち合わせ時間</p>
    <input type="text" name="meeting_time" value="{{ $form->meeting_time }}" /><br />
    <p>募集内容</p>
    <input type="text" name="recruitment_contents" value="{{ $form->recruitment_contents }}" /><br />
    <input type="submit" value="更新">
  </form>

  <ul>
    @foreach ($events as $event)
      <li>{{ $event->name }}</li>
    @endforeach
  </ul>
@endsection