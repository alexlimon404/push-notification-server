@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="">My Images</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">Upload Image</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">Setting</a>
                </li>

            </ul>
            @yield('content_image')
        </div>
    </div>
@endsection