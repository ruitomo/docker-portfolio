{{-- <div class="user-icon-container">
    <img src="{{ $imgPath }}" alt="アイコン画像" class="user-icon">
    <span class="user-name">{{ $name }}</span>
</div> --}}
<div class="user-icon">
    @if (!empty($imgPath))
    <img src="{{ asset($imgPath) }}" alt="{{ $name }}'s profile image" width="50" height="50" />


    @else
        <img src="{{ asset('images/default-avatar.png') }}" alt="Default profile image" width="50" height="50" />
    @endif
    <span>{{ $name }}</span>
</div>


