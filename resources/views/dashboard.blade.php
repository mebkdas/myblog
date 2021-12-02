@extends('layouts.app')

@section('content')
<div class="container">
    @if(session('flashuser'))
    <p>Blog save for {{session('flashuser')}}</p>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-12">
            <a href="/addBlog"><button type="button" class="btn btn-primary">Add New Blog</button></a>
            <a href="{{route('logout')}}"><button type="button" class="btn btn-primary">Logout ?</button></a>
            <a href="/addto"><button type="button" class="btn btn-primary">Addto</button></a>
            <div class="card">
                <div class="card-header"><strong>{{ __('Blog List') }}</strong></div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th scope="col">Project Name</th>
                            <th scope="col">Date</th>
                            <th scope="col">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($blogs as $blog)
                                <tr>
                                    <td>{{$blog->title}}</td>
                                    <td>{{$blog->created_at}}</td>
                                   
                                    <td><a href="{{route('viewBlog',[$blog->id])}}" class="btn btn-warning">View</a>
                                    <a href="{{route('updateBlog',[$blog->id])}}" class="btn btn-info">Edit</a>
                                    <a href="{{route('deleteBlog',[$blog->id])}}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item')">Delete</a></td>
                                </tr>    
                            @endforeach
                        </tbody>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
