@extends('push.layouts.app')

@section('content_push')
    <div class="col-md-10">
        <div class="card">
            <div class="card-header">Make Push</div>
            <div class="card-body">
                <form action="make-push" method="post">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name='title' placeholder="Enter your title">
                        <small id="title" class="form-text text-muted">maximum length of 48 letters</small>
                    </div>
                    <div class="form-group">
                        <label for="message">Message</label>
                        <input type="text" class="form-control" id="message" name='message' placeholder="Enter your message">
                        <small id="message" class="form-text text-muted">Maximum length of 100 letters</small>
                    </div>
                    <div class="form-group">
                        <label for="url">Url</label>
                        <input type="text" class="form-control" id="url" name='url' placeholder="Enter your url">
                        <small id="url" class="form-text text-muted">unlim</small>
                    </div>
                    <div class="form-group">
                        <label for="icon">Icon</label>
                        <input type="text" class="form-control" id="icon" name='icon' placeholder="Enter picture link">
                        <small id="icon" class="form-text text-muted">unlim</small>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="inputState">State</label>
                            <select id="inputState" class="form-control">
                                <option selected>all</option>
                                <option>...</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputDevice">Device</label>
                            <select id="inputDevice" class="form-control">
                                <option selected>all</option>
                                <option>...</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputBrowser">Browser</label>
                            <select id="inputBrowser" class="form-control">
                                <option selected>all</option>
                                <option>...</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    {{ method_field('post') }}
                    {{ csrf_field() }}
                </form>

            </div>
        </div>
    </div>
@endsection