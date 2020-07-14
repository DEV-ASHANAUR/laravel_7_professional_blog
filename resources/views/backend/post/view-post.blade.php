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
                <small class="d-sm-block"><a href="{{ route('post.create') }}" class="btn btn-success btn-sm"><i class="fas fa-plus-circle mr-1"></i> Create Post</a></small>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Sl.</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Tags</th>
                                <th>Author</th>
                                <th>Image</th>
                                <th>Created_At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @foreach ($alldata as $key => $post)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->category->name }}</td>
                                <td>
                                    @foreach ($post->tags as $tag)
                                        <span class="badge badge-primary">{{ $tag->name }}</span>
                                    @endforeach
                                </td>
                                <td>{{ $post->user->name }}</td>
                                <td>
                                    <img src="{{ url('upload/posts_photo/'.$post->image) }}" class="img-fluid img-thumbnail" width="100px" alt="">
                                </td>
                                <td>{{ date('d-M-Y',strtotime($post->created_at)) }}</td>
                                <td class="d-flex">
                                    <a href="{{ route('post.show',$post->id) }}" title="View" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>

                                    <a href="{{ route('post.edit',$post->id) }}" title="Edit" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>

                                    <a href="{{ route('post.destroy',$post->id) }}" id="delete" title="Delete" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                    
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Sl.</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Tags</th>
                                <th>Author</th>
                                <th>Image</th>
                                <th>Created_At</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        
        {{-- previous datatable --}}
    </div>
</main>
@endsection 