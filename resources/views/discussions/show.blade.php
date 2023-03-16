@extends('layouts.app')

@section('content')
    <div class="card">
        @include('partials.discussion-header')

        <div class="card-body">

            <div class="text-center fw-bold">
                {{ $discussion->title }}
            </div>
            <hr>
            {!! $discussion->content !!}
        </div>
    </div>
    <div class="fw-bold text-center py-5">
        Replies
        <hr>
    </div>

    @foreach ($discussion->replies->paginate(3) as $reply)
        <div class="card my-3">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div>
                        <img width="40px" height="40px" style="border-radius: 50%" src="{{ Gravatar::get($reply->owner->email) }}" alt="">

                        <span class="bold">{{ $reply->owner->name }}</span>
                    </div>
                </div>
            </div>
            <div class="card-body">
                {!! $reply->content !!}
            </div>
        </div>
    @endforeach
    {{ $discussion->replies()->paginate(3)->links }}

    <div class="card my-3">
        <div class="card-header">
            <span class="fw-bold">
                Add a reply
            </span>
        </div>
        <div class="card-body">

            @auth
            <form action="{{ route("replies.store", $discussion->slug) }}" method="post">
                @csrf

                <div class="mb-3">
                    <input id="content" value="" type="hidden" name="content">
                    <trix-editor input="content"></trix-editor>
                </div>


                <div class="mb-3">
                    <button class="btn btn-success">
                        Add reply
                    </button>
                </div>

            </form>
            @else
            <a href="{{ route("login") }}" class="btn btn-info">Sign in to add a reply</a>
            @endauth
        </div>
    </div>

@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
@endsection

@section('js')
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>
@endsection
