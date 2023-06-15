<div class="column-work">
    <div class="work-name">{{ $work->user->name }}</div>
    <div class="work-title">{{ $work->name }}</div>
    <div class="work-image">
        @if (!is_null($work->image) && isset($work->image) )
            <img src="{{ Storage::url($work->image) }}" alt="" class="work">
        @else
            <img src="{{ asset('img/maxresdefault.jpg') }}" alt="" class="work">
        @endif
    </div>
    <div class="work-like">
        <form class="like__form" action="{{ route('like', $work->id) }}" method="POST">
            @csrf
            @method('PATCH')
            <button type="button" onclick="like(this)" class="like-image">
                <i class="fa-solid fa-thumbs-up like @if($work->userHaveLike()) active @endif "></i>
            </button>
            <div class="like-count">{{ $work->likes_count }}</div>
        </form>
    </div>
</div>
