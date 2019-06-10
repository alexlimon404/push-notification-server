@extends('push.settings.layouts.app')

@section('content_settings')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('change_email_pass') }}" method="post">
                <div class="form-group row">
                    <label for="Email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{ $user->email }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="old_password" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="old_password" name="old_password" placeholder="Old Password">
                        <small id="old_password" class="form-text text-muted">Input old password</small>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="password" name="password" placeholder="New Password">
                        <small id="password" class="form-text text-muted">Input new password</small>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password_confirmation" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="New Password">
                        <small id="password_confirmation" class="form-text text-muted">Confirm New Password</small>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Change</button>
                {{ method_field('post') }}
                {{ csrf_field() }}
            </form>
        </div>
    </div>
    @if(session('alert'))
    <div class="{{ session('alert') }}" role="alert">
        {{ session('message') }}
    </div>
    @endif
@endsection