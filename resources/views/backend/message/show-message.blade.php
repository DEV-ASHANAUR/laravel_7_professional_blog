@extends('layouts.admin')
@section('content')

<main>
    <div class="container-fluid">
        <h3 class="mt-4">View Message</h3>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">View Message</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span><i class="fas fa-table mr-1"></i>View Message</span>
                <small class="d-sm-block"><a href="{{ route('message.view') }}" class="btn btn-success btn-sm"><i class="fas fa-plus-circle mr-1"></i> Message List</a></small>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Sender Name</th>
                                <th>{{ $message->name }}</th>
                            </tr>
                            <tr>
                                <th>Sender Email</th>
                                <th>{{ $message->email }}</th>
                            </tr>
                            <tr>
                                <th>Message Subject</th>
                                <th>{{ $message->subject }}</th>
                            </tr>
                            <tr>
                                <th>Message</th>
                                <th>{!! $message->message !!}</th>
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