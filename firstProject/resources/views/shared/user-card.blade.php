<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">

                <img style="width:150px" class="me-3 avatar-sm rounded-circle"
                    src={{$user->get_imageUrl()}} alt="Mario Avatar">
                <div>
                    @if ($editing ?? false)
                        @auth
                            @if (Auth::id() == $user->id)
                                <form method="POST" enctype="multipart/form-data" action={{route("users.update",$user->id)}} >
                                    @csrf
                                    @method("put")
                                    <input type="text" name="name" value="{{ $user->name }}" class="form-control">
                                    @error('name')
                                        <span>{{ $message }}</span>
                                    @enderror
                                    <label for="image" class="mt3">Profile Picture</label>
                                    <input type="file" name="image" class="form-control">
                                    @error('image')
                                        <span>{{ $message }}</span>
                                    @enderror
                                    <div class="mt-3">
                                        <button type="submit" class="btn btn-primary btn-sm"> save </button>
                                    </div>
                                </form>
                            @endif
                        @endauth
                    @else
                        <h3 class="card-title mb-0"><a href="#"> {{ $user->name }}
                            </a></h3>
                    @endif
                    <span class="fs-6 text-muted">{{ $user->email }}</span>
                </div>

            </div>
            <div>
                @auth
                    @if (Auth::id() == $user->id)
                        <a href={{ route('users.edit', $user->id) }}>Edit</a>
                    @endif
                @endauth
            </div>
        </div>
        <div class="px-2 mt-4">
            <h5 class="fs-5"> About : </h5>
            <p class="fs-6 fw-light">
                Hi there
            </p>
            <div class="d-flex justify-content-start">
                <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-user me-1">
                    </span> {{ $user->followersCount() }} </a>
                <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-brain me-1">
                    </span> {{ $user->ideas()->count() }} </a>
                <a href="#" class="fw-light nav-link fs-6"> <span class="fas fa-comment me-1">
                    </span> {{ $user->comments()->count() }} </a>
            </div>
            @auth
                @if (Auth::id() !== $user->id)
                    <div class="mt-3">
                        @if (Auth::user()->follow($user))
                        <form method="POST" action={{route("user.unfollow", $user->id)}}>
                            @csrf
                        <button type="submit" class="btn btn-danger btn-primary btn-sm"> UnFollow </button>
                    </form>
                        @else
                        <form method="POST" action={{route("user.follow", $user->id)}}>
                            @csrf
                        <button type="submit" class="btn btn-primary btn-sm"> Follow </button>
                    </form>
                        @endif

                    </div>
                @endif

            @endauth

        </div>
    </div>
</div>
<hr>
