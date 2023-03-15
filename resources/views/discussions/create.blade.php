@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-end mb-3">
    <a href="{{ route("discussions.create") }}" class="btn btn-success">Add Discussion</a>
</div>

<div class="card">
    <div class="card-header">Add Discussions</div>

    <div class="card-body">
        <form action="{{ route("discussions.store") }}" method="post">
        @csrf

        <div class="mb-3">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control">
        </div>

        <div class="mb-3">
            {{-- <label for="content">Content</label>
            <input type="text" name="content" class="form-control"> --}}
            <input id="content" placeholder="Editor content goes here" type="hidden" name="content">
            <trix-editor input="content"></trix-editor>
        </div>

        <div class="mb-3">
            <label for="channel">Channel</label>
            <select class="form-control" name="channel" id="channel">
                @foreach ($channels as $channel)
                    <option value="{{ $channel->id }}">{{ $channel->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <button class="btn btn-primary">Create discussion</button>
        </div>
        </form>
    </div>
</div>
@endsection

@section("css")
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
@endsection

@section("js")
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>
@endsection

