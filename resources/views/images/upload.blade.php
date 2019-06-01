@extends('images.layouts.app')

@section('content_image')
    <div class="col-md-10">
        <div class="card">
            <div class="card-header">Upload Image @if(isset($success)) {{ $success }}  @endif</div>
            <div class="card-body">
                <form enctype="multipart/form-data" action="{{ route('upload_image_file') }}" method="post">
                    <div class="form-group">
                        <label for="imageFile">Max Upload file 2mb</label>
                        <input type="file" class="form-control-file" id="imageFile" name="imageFile">
                    </div>
                    <button type="submit" class="btn btn-primary">Upload</button>
                    {{ method_field('post') }}
                    {{ csrf_field() }}
                </form>
            </div>
        </div>
    </div>
@endsection