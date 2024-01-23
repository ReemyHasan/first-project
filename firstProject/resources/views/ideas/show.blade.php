@extends('layout.layout')
@section('content')
    <div class="row">
        <div class="col-3">
            @include('shared.side-bar')

        </div>
        <div class="col-6">
            <hr>
                <div class="mt-3">
                    @include('shared.idea-card')
                </div>
        </div>
        <div class="col-3">
            @include('shared.search-bar')
        </div>
    </div>
@endsection
