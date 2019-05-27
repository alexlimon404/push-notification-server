@extends('push.layouts.app')

@section('content_push')
    <div class="col-md-10">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link {{ request()->is('*/profile') ? 'active' : '' }}" href="{{ route('my_profile_settings') }}">My Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('*/server') ? 'active' : '' }}" href="{{ route('my_server_settings') }}">My Server</a>
            </li>
        </ul>
        @yield('content_settings')
    </div>
@endsection