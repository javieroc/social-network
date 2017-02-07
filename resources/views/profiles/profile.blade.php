@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <p class="text-center">
                        {{ $user->name }} Profile
                    </p>
                </div>
                <div class="panel-body">
                    <center>
                        <img src="{{ Storage::url($user->avatar) }}" width="140px" height="140px" style="border-radius: 50%" alt="">
                    </center>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
