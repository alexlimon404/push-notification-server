@extends('push.settings.layouts.app')

@section('content_settings')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('change_api') }}" method="post">
                <div class="form-group row">
                    <label for="api" class="col-sm-2 col-form-label">Your Api Key</label>
                    <div class="col-sm-10">
                        <input type="text" readonly class="form-control-plaintext" id="api" name="api" value="{{ $user->api_token ? $user->api_token : 'Generate a key' }}">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" name="change_api" value="true">Generate new  API key</button>
                {{ method_field('post') }}
                {{ csrf_field() }}
            </form>
        </div>
    </div>
@endsection