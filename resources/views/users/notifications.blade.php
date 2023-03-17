@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">Notifications</div>

    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        @foreach ($notifications as $notification)
            <ul class="list-group">
                <li class="list-group-item">
                    @if ($notification->type === "App\Notifications\NewReplyAdded")
                        A new reply was added to your discussion
                        <strong>
                            {{ $notification->data["discussion"]["title"] }}
                        </strong>

                        <a href="{{ route("discussions.show", $notification->data["discussion"]["slug"]) }}" class="float-end text-primary">
                            View Discussion
                        </a>
                    @endif

                    @if ($notification->type === "App\Notifications\ReplyMarkedAsBestReply")
                        Your reply to the discussion
                        <strong>
                            {{ $notification->data["discussion"]["title"] }}
                        </strong>
                        was marked as best reply
                        <a href="{{ route("discussions.show", $notification->data["discussion"]["slug"]) }}" class="float-end text-primary">
                            View Discussion
                        </a>
                    @endif

                </li>
            </ul>
        @endforeach
    </div>
</div>
@endsection
