@extends('push.layouts.app')

@section('content_push')
    <div class="col-md-10">
        <div class="card">
            <div class="card-header">Statistics</div>
            <table class="table table-sm">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Body</th>
                    <th scope="col">Icon</th>
                    <th scope="col">Action</th>
                    <th scope="col">Success</th>
                    <th scope="col">Failure</th>
                    <th scope="col">Time</th>
                </tr>
                </thead>
                <tbody>
                @foreach($messages as $message)
                <tr>
                    <td scope="row">{{ $message->id }}</td>
                    <td>{{ $message->title }}</td>
                    <td>{{ $message->body }}</td>
                    <td><img src="{{ $message->icon }}" width="50"></td>
                    <td><a href="{{ $message->click_action }}" target="_blank">link</a> </td>
                    <td>{{ $message->success }}</td>
                    <td>{{ $message->failure }}</td>
                    <td>{{ $message->created_at }}</td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection