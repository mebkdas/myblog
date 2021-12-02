@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <a href="/addBlog"><button type="button" class="btn btn-primary">Add New Blog</button></a>
            <div class="card">
                <div class="card-header"><h2>{{$blogs->title}}</h2></div>
                <div class="card-body">
                    <div class="container">
                        <p style="text-align:right;">{{$blogs->created_at}}</p>
                        <h3>{{$blogs->description}}</h3>
                        <img src="/uploads/users/{{$blogs->file}}" width="256px">
                    </div>
                </div>
            </div>
            <a href="{{route('updateBlog',[$blogs->id])}}" class="btn btn-info">Edit</a>
        </div>
    </div>
</div>
@endsection
