@extends('push.layouts.app')

@section('content_push')
    <div class="col-md-10">
        <div class="card">
            <div class="card-header">Subscribers @if(isset($domain->domain_name)) -> <span class="border border-success"> https://{{ $domain->domain_name}} </span>@endif</div>
            <div class="card-body">
                <form action="{{ route('push_subscribers_count') }}" method="post">
                    <div class="form-inline">
                        <label for="inputBrowser">Your domains:</label>
                        <select id="inputBrowser" class="form-control" name="domain">
                            @foreach ($domainNames as $domainName)
                                <option value="{{ $domainName->id }}">{{ $domainName->domain_name }}</option>
                            @endforeach
                        </select>
                            <button type="submit" class="btn btn-primary">Count</button>
                            {{ method_field('post') }}
                            {{ csrf_field() }}
                    </div>
                </form>
            </div>
            <div class="card-body row">
            <div class="card" style="width: 10rem;">
                <div class="card-body">
                    <h5 class="card-title">Device Type</h5>
                    @foreach($deviceTypes as $deviceType)
                        <h6 class="card-subtitle mb-2 text-muted">{{ $deviceType->device_type }} - {{ $deviceType->device_count }}</h6>
                    @endforeach
                </div>
            </div>
            <div class="card" style="width: 10rem;">
                <div class="card-body">
                    <h5 class="card-title">Device Type</h5>
                    @foreach($deviceTypes as $deviceType)
                        <h6 class="card-subtitle mb-2 text-muted">{{ $deviceType->device_type }} - {{ $deviceType->device_count }}</h6>
                    @endforeach
                </div>
            </div>
            </div>
        </div>
    </div>
@endsection