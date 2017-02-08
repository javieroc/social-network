@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit your Profile.</div>

                <div class="panel-body">
                    <form action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="location">Upload Avatar</label>
                            <input type="file" name="avatar" class="form-control" accept="image/*"></input>
                        </div>

                        <div class="form-group">
                            <label for="location">Location</label>
                            <input type="text" id="location" name="location" value="{{ $profile->location }}" class="form-control" required></input>
                        </div>

                        <div class="form-group">
                            <label for="about">About me</label>
                            <textarea name="about" id="about" cols="30" rows="10" class="form-control" required>{{ $profile->about }}</textarea>
                        </div>

                        <div class="form-group">
                            <p class="text-center">
                                <button type="submit" class="btn btn-lg btn-primary">
                                    Save your information
                                </button>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
