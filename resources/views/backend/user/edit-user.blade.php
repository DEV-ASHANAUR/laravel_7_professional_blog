@extends('layouts.admin')
@section('content')

<main>
    <div class="container-fluid">
        <h3 class="mt-4">Edit User</h3>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Edit User</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span><i class="fas fa-edit mr-1"></i>Edit User</span>
                <small class="d-sm-block"><a href="{{ route('user.view') }}" class="btn btn-success btn-sm"><i class="fas fa-list mr-1"></i>User List</a></small>
            </div>
            <div class="card-body">
                @include('includes.error')
                <form action="{{ route('user.update',$editdata->id) }}" method="post" id="Myform">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="name">User Name</label>
                            <input type="text" class="form-control" value="{{ $editdata->name }}" name="name" id="name">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" value="{{ $editdata->email }}" name="email" id="email">
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        
        {{-- previous datatable --}}
    </div>
</main>
<script>
    $(document).ready(function () {
      $('#Myform').validate({
        rules: {
          name: {
            required: true,
          },
          email: {
            required: true,
            email: true,
          }
          
        },
        messages: {
          name: {
            required: "Please Enter Name",
          },
          email: {
            required: "Please enter a email address",
            email: "Please enter a vaild email address"
          }
          
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
          error.addClass('invalid-feedback');
          element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
          $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
          $(element).removeClass('is-invalid');
        }
      });
    });
    </script>

@endsection 