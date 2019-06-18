@extends('push.layouts.app')

@section('content_push')
    <div class="col-md-10">
        <div class="card">
            <div class="card-header">Ip Info</div>
            <div class="card-body">
                <form action="{{ route('push_ip_info_search') }}" method="post">
                    <div class="form-inline">
                        <div class="form-group mx-sm-3 mb-2">
                            <label for="IP" class="sr-only">Email</label>
                            <input type="text" readonly class="form-control-plaintext" id="IP" value="IP:">
                        </div>
                        <div class="form-group mx-sm-3 mb-2">
                            <label for="inputIP" class="sr-only">IP</label>
                            <input type="text" class="form-control" id="inputIP" name="ip" placeholder="127.0.0.1">
                        </div>
                        <button type="submit" class="btn btn-primary">Search</button>
                        {{ method_field('post') }}
                        {{ csrf_field() }}
                    </div>
                </form>
                @if(session('ip'))
                <p class="text-left">ip <span class="text-success">"{{session('ip')}}"</span></p>
                <p class="text-left">city <span class="text-success">"{{session('city')}}"</span></p>
                <p class="text-left">region <span class="text-success">"{{session('region')}}"</span></p>
                <p class="text-left">country <span class="text-success">"{{session('country')}}"</span></p>
                <p class="text-left">country <span class="text-success">"{{session('isp')}}"</span></p>
                @endif
            </div>
            </div>

        </div>
    </div>
@endsection