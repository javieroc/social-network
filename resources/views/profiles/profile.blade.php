@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ $user->name }} Profile
                </div>
                <div class="panel-body">
                    <h1>{{ $user->avatar }}</h1>
                    <img src="{{ Storage::url($user->avatar) }}" width="70px" height="70px" style="border-radius: 50%" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
