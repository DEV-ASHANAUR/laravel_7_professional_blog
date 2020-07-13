@extends('layouts.admin')
@section('content')

<main>
    <div class="container-fluid">
        <h3 class="mt-4">Category</h3>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Category</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span><i class="fas fa-table mr-1"></i>View Category</span>
                <small class="d-sm-block"><a href="{{ route('category.create') }}" class="btn btn-success btn-sm"><i class="fas fa-plus-circle mr-1"></i> Add Category</a></small>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Sl.</th>
                                <th>Category Name</th>
                                <th>Slug Name</th>
                                <th>Count Post</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @foreach ($alldata as $key => $cate)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $cate->name }}</td>
                                <td>{{ $cate->slug }}</td>
                                <td>5</td>
                                <td>
                                    <a href="{{ route('category.edit',$cate->id) }}" title="Edit" class="btn btn-primary btn-sm"><i class="fas fa-edit mr-1"></i></a>

                                    <a href="{{ route('category.destroy',$cate->id) }}" id="delete" title="Delete" class="btn btn-danger btn-sm"><i class="fas fa-trash mr-1"></i></a>
                                    
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Sl.</th>
                                <th>Category Name</th>
                                <th>Slug Name</th>
                                <th>Count Post</th>
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