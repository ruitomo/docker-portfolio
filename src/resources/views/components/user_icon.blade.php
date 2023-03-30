{{-- <div class="user-icon-container">
    <img src="{{ $imgPath }}" alt="アイコン画像" class="user-icon">
    <span class="user-name">{{ $name }}</span>
</div> --}}
<div class="user-icon">
    <a href="{{ $route ?? '' }}">
        @if (!empty($imgPath))
        <img src="{{ asset($imgPath) }}" alt="{{ $name }}'s profile image" class="icon-image" />
        @else
            <img src="{{ asset('images/default-avatar.png') }}" alt="Default profile image" class="icon-image" />
        @endif
    </a>
    <span class="user-name">{{ $name }}</span>
</div>


<style>
    .user-icon {
        display: flex;
        align-items: center;
    }

    .icon-image {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        object-fit: cover;
        margin-right: 10px;
    }

    .user-name {
        margin: 0;
    }
</style>




