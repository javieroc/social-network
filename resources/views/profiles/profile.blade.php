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
                    <br />
                    <p class="text-center">
                        {{ $user->profile->location }}
                    </p>
                    <br />
                    <p class="text-center">
                        @if(Auth::id() == $user->id)
                            <a href="{{ route('profile.edit') }}" class="btn btn-lg btn-info">Edit your Profile</a>
                        @endif
                    </p>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-body">
                    <friend :profile_user_id="{{ $user->id }}"></friend>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <p class="text-center">
                        About me.
                    </p>
                </div>
                <div class="panel-body">
                    <p class="text-center">
                        {{ $user->profile->about }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
