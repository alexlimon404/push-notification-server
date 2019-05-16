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
                        <input type="text" class="form-control" id="message"  placeholder="Enter your message">
                        <small id="message" class="form-text text-muted">Maximum length of 100 letters</small>
                    </div>
                    <div class="form-group">
                        <label for="url">Url</label>
                        <input type="text" class="form-control" id="url"  placeholder="Enter your url">
                        <small id="url" class="form-text text-muted">unlim</small>
                    </div>
                    <div class="form-group">
                        <label for="icon">Icon</label>
                        <input type="text" class="form-control" id="icon"  placeholder="Enter picture link">
                        <small id="icon" class="form-text text-muted">unlim</small>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    {{ method_field('post') }}
                    {{ csrf_field() }}
                </form>

            </div>
        </div>
    </div>
@endsection