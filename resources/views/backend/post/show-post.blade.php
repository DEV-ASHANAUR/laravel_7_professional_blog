@extends('layouts.admin')
@section('content')

<main>
    <div class="container-fluid">
        <h3 class="mt-4">Post</h3>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Post</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span><i class="fas fa-table mr-1"></i>View Post</span>
                <small class="d-sm-block"><a href="{{ route('post.view') }}" class="btn btn-success btn-sm"><i class="fas fa-plus-circle mr-1"></i> Post List</a></small>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th><img src="{{ url('upload/posts_photo/'.$alldata->image) }}" class="img-fluid img-thumbnail" width="300px" height="300px" alt=""></th>
                            </tr>
                            <tr>
                                <th>Title</th>
                                <th>{{ $alldata->title }}</th>
                            </tr>
                            <tr>
                                <th>Category</th>
                                <th>{{ $alldata->category->name }}</th>
                            </tr>
                            <tr>
                                <th>Tag</th>
                                <th>
                                    @foreach ($alldata->tags as $tag)
                                        <span class="badge badge-primary">{{ $tag->name }}</span>
                                    @endforeach
                                </th>
                            </tr>
                            <tr>
                                <th>Author</th>
                                <th>{{ $alldata->user->name }}</th>
                            </tr>
                            <tr>
                                <th>Description</th>
                                <th>{!! $alldata->description !!}</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
        
        {{-- previous datatable --}}
    </div>
</main>
@endsection 