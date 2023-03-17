@extends('layouts.app')

@section('content')

    @foreach ($discussions as $discussion)
        <div class="card mb-3">

            @include("partials.discussion-header")

            <div class="card-body">
                <div class="text-center fw-bold">
                    {{ $discussion->title }}

                </div>
            </div>
        </div>

        {{ $discussions->appends(["channel" => request()->qurey("channel")])->links() }}
    @endforeach
@endsection
