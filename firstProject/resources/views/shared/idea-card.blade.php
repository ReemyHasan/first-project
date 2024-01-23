<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:50px" class="me-2 avatar-sm rounded-circle" src="{{ $idea->user->get_imageUrl() }}"
                    alt={{ $idea->user->name }}>
                <div>
                    <h5 class="card-title mb-0"><a href="{{ route('users.show', $idea->user->id) }}">
                            {{ $idea->user->name }}
                        </a></h5>
                </div>
            </div>

            <a href={{ route('idea.show', $idea->id) }}>View</a>
            @auth

                @can('update', $idea)
                    <form method="POST" action=" {{ route('idea.destroy', $idea->id) }} ">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger btn-sm">X</button>
                    </form>
                    <a href={{ route('idea.edit', $idea->id) }}>Edit</a>
                @endcan
            @endauth

        </div>
    </div>

    <div class="card-body">
        <p class="fs-6 fw-light text-muted">
            {{ $idea->content }}
        </p>
        <div class="d-flex justify-content-between">
            @include('ideas.likes')
            <div>
                <span class="fs-6 fw-light text-muted"> <span class="fas fa-clock"> </span>
                    {{ $idea->created_at }} </span>
            </div>
        </div>

        @include('shared.comment')

    </div>

</div>
