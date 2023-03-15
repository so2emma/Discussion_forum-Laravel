@extends('layouts.app')

@section('content')

<div class="card">

    @include("partials.discussion-header")

    <div class="card-body">
        <div class="text-center fw-bold">
        {{ $discussion->title }}
        </div>

        <hr>

        {!! $discussion->content !!}
    </div>
</div>
@endsection
