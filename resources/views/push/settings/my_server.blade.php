@extends('push.settings.layouts.app')

@section('content_settings')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('create_server') }}" method="post">
                <div class="form-group row">
                    <label for="domain" class="col-sm-2 col-form-label">Domain *</label>
                    <div class="col-sm-10">
                        <div class="input-group-prepend">
                            <div class="input-group-text">https://</div>
                            <input type="text" class="form-control" id="domain" name="domain" placeholder="example.com">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="sender_id" class="col-sm-2 col-form-label">Sender ID *</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="sender_id" name="sender_id" placeholder="">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="server_key" class="col-sm-2 col-form-label">Server Key *</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="server_key" name="server_key" placeholder="">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="legacy_server_key" class="col-sm-2 col-form-label">Legacy Server Key</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="legacy_server_key" name="legacy_server_key" placeholder="">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Add server</button>
                        {{ method_field('post') }}
                        {{ csrf_field() }}
                    </div>
                </div>
            </form>
            <table class="table">
                <thead class="thead-light">
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Domain</th>
                    <th scope="col">Sender ID</th>
                    <th scope="col">Server Key</th>
                    <th scope="col">Legacy Server Key</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>example.com</td>
                    <td>123123</td>
                    <td>@mdo</td>
                    <td>@mdo</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection