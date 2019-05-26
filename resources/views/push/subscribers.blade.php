@extends('push.layouts.app')

@section('content_push')
    <div class="col-md-10 row">
        <div class="card-title" style="width: 100rem">
            <div class="form-group">
                <label for="inputBrowser">Your domains</label>
                <form action="{{ route('push_subscribers_count') }}" method="post">
                <select id="inputBrowser" class="form-control" name="domain">
                    @foreach ($domainNames as $domainName)
                        <option value="{{ $domainName->id }}">{{ $domainName->domain_name }}</option>
                    @endforeach
                </select>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    {{ method_field('post') }}
                    {{ csrf_field() }}
                </form>
            </div>
        </div>
        <div class="card" style="width: 10rem;">
            <div class="card-body">
                <h5 class="card-title">Device Type</h5>
                @foreach($deviceTypes as $deviceType)
                    <h6 class="card-subtitle mb-2 text-muted">{{ $deviceType->device_types }} - {{ $deviceType->device_count }}</h6>
                @endforeach
            </div>
        </div>
    </div>
@endsection