@extends('layouts.app')

@section('css')

@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('page_push') }}">Send Push</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('push_subscribers') }}">Subscribers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('push_statistics') }}">Statistics Push</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('push_ip_info') }}">Ip Info</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('my_profile_settings') }}">Settings</a>
                </li>
            </ul>
            @yield('content_push')
        </div>
    </div>
@endsection
