@extends('layouts.app')

@section('content')
<div class="container">
    @if(session('flashuser'))
    <p>Blog save for {{session('flashuser')}}</p>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><strong>{{ __('Add New Blog Form') }}</strong></div>
                <div class="card-body">
                    <form class="text-center border border-light p-5" method="POST" enctype="multipart/form-data" action="addBlog">
                        @csrf
                        <input type="text" id="title" name="title" class="form-control mb-4" placeholder="Blog Title" required="">
                        <div class="form-group">
                            <textarea class="form-control rounded-0" rows="3" name="desc" id="desc" placeholder="Blog Description" required=""></textarea>
                        </div>
                        <input type="file" id="file" name="file" accept="image/*" class="form-control mb-4" required="">
                        <input type="submit" name="save" id="save" class="btn btn-primary " value="Add Blog">
                        <input type="reset" class="btn btn-info " value="Reset">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
