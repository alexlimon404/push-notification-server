@extends('push.layouts.app')

@section('content_push')
    <div class="col-md-10">
        <div class="card">
            <div class="card-header">Subscribers</div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                You are logged in!
            </div>
        </div>
    </div>
@endsection