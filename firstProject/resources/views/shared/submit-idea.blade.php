@auth

<h4> Share yours ideas </h4>
<div class="row">

    <form action={{ route('idea.store') }} method="POST">
        <div class="mb-3">
            @csrf
            <textarea name="idea" class="form-control" id="idea" rows="3"></textarea>
            @error('idea')
                @include('shared.error-message')
            @enderror
        </div>
        <div class="">
            <button type="submit" class="btn btn-dark"> Share </button>
        </div>
    </form>
</div>
@endauth
