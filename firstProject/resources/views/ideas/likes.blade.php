<div>
    @auth
        @if (!Auth::user()->likesIdea($idea))
            <form method="POST" action={{ route('idea.like', $idea->id) }}>
                @csrf
                <button type="submit" class="fw-light nav-link fs-6">
                    <span class="far fa-heart me-1"></button>

            </form>
        @else
            <form method="POST" action={{ route('idea.unlike', $idea->id) }}>
                @csrf
                <button type="submit" class="fw-light nav-link fs-6">
                    <span class="fas fa-heart me-1"> </button>

            </form>
        @endif
        </span> {{ $idea->likes()->count() }}


    @endauth
</div>
