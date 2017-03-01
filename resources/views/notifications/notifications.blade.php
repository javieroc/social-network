@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading text-center"><h3>Notifications</h3></div>

                <div class="panel-body">
                    <ul class="list-group">
                        @foreach($notifications as $notification)
                            <li class="list-group-item">
                                <img src="{{ $notification->notificater->avatar }}" width="40px" height="40px" style="border-radius: 50%">&nbsp;
                                {{ $notification->data['name'] }} &nbsp;|&nbsp;
                                {{ $notification->data['message'] }}
                                <span class="pull-right">{{ $notification->created_at->diffforHumans() }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
