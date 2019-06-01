@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('image_page') }}">My Images</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('upload_image_page') }}">Upload Image</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">Setting</a>
                </li>

            </ul>
            @yield('content_image')
        </div>
    </div>
@endsection