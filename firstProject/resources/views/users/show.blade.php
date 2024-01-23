@extends('layout.layout')
@section('title',$user->name)
@section('content')
    <div class="row">
        <div class="col-3">
            @include('shared.side-bar')
        </div>
        <div class="col-6">
            <div class="mt-3">

                @include('shared.user-card')
            </div>
            @foreach ($ideas as $idea)
                    <div class="mt-3">
                        @include('shared.idea-card')
                    </div>
                @endforeach
                {{ $ideas->withQueryString()->links() }}
            <hr>


        </div>
        <div class="col-3">
            @include('shared.search-bar')
            @include('shared.follow-bar')

        </div>
    </div>
@endsection
