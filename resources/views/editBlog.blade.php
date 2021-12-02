@extends('layouts.app')

@section('content')
<div class="container">
    @if(session('flashuser'))
    <p>Blog Update for {{session('flashuser')}}</p>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><strong>{{ __('Edit Blog') }}</strong></div>
                <div class="card-body">
                    <form class="text-center border border-light p-5" method="POST" enctype="multipart/form-data" action="/updateBlog">
                        @csrf
                        <input type="hidden" name="id" value="{{$blogs->id}}"/>
                        <input type="text" id="title" name="title" class="form-control mb-4" placeholder="Blog Title" value="{{$blogs->title}}"required="">
                        <div class="form-group">
                            <textarea class="form-control rounded-0" rows="3" name="desc" id="desc" placeholder="Blog Description" required="">{{$blogs->description}}</textarea>
                        </div>
                        <img src="/uploads/users/{{$blogs->file}}" width="150px" height="150px">
                        <input type="file" id="file" name="file" accept="image/*" class="form-control mb-4">
                        <input type="submit" name="save" id="save" class="btn btn-primary " value="Update Blog">
                        <input type="reset" class="btn btn-info " value="Reset">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
