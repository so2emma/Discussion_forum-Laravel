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


    <div class="card">
        <div class="card-header">
            Add a reply
        </div>
        <div class="card-body">

            @auth
            <form action="{{ route("replies.store", $discussion->slug) }}" method="post">
                @csrf

                <div class="mb-3">
                    <input id="reply" value="" placeholder="Add a reply" type="hidden" name="reply">
                    <trix-editor input="reply"></trix-editor>
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
