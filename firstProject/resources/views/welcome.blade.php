@extends('layout.layout')
@section('content')
    <div class="row">
        <div class="col-3">
            @include('shared.side-bar')
        </div>
        <div class="col-6">

            @include('shared.success-message')
            @include('shared.submit-idea')
            <hr>
            @if (count($ideas) > 0)
                @foreach ($ideas as $idea)
                    <div class="mt-3">
                        @include('shared.idea-card')
                    </div>
                @endforeach
                {{ $ideas->withQueryString()->links() }}
            @else
                No result Found
            @endif

        </div>
        <div class="col-3">
            @include('shared.search-bar')
            @include('shared.follow-bar')

        </div>
    </div>
@endsection
