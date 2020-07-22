@extends('layouts.admin')
@section('content')

<main>
    <div class="container-fluid">
        <h3 class="mt-4">Contact Message</h3>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Contact Message</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span><i class="fas fa-table mr-1"></i>View Message</span>
                {{-- <small class="d-sm-block"><a href="{{ route('post.create') }}" class="btn btn-success btn-sm"><i class="fas fa-plus-circle mr-1"></i> Create Post</a></small> --}}
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Sl.</th>
                                <th>Name</th>
                                <th>Subject</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @foreach ($message as $key => $message)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $message->name }}</td>
                                <td>{{ $message->subject }}</td>
                                <td>{{ date('d-M-Y',strtotime($message->created_at)) }}</td>
                                <td>
                                    <a href="{{ route('message.show',$message->id) }}" title="View" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>

                                    <a href="{{ route('message.destroy',$message->id) }}" id="delete" title="Delete" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                    
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Sl.</th>
                                <th>Name</th>
                                <th>Subject</th>
                                <th>Created At</th>
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