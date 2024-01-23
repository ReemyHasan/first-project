<h4> Share yours ideas </h4>
<div class="row">

    <form action={{ route('idea.update', $idea->id) }} method="POST">
    <div class="mb-3">
        @csrf
        @method('put')
        <textarea name="idea" class="form-control" id="idea" rows="3">
            {{$idea->content}}
        </textarea>
        @error('idea')

        @include('shared.error-message')
        @enderror
    </div>
    <div class="">
        <button type="submit" class="btn btn-dark"> update </button>
    </div>
</form>
</div>
