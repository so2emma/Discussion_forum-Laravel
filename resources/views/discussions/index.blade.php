@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('discussions.create') }}" class="btn btn-success">Add Discussion</a>
    </div>

    @foreach ($discussions as $discussion)
        <div class="card mb-3">
            <div class="card-header">{{ $discussion->title }}</div>

            <div class="card-body">
               {!!$discussion->content  !!} 
            </div>
        </div>

        {{ $discussions->links() }}
    @endforeach
@endsection
