@extends('layouts.admin')
@section('content')

<main>
    <div class="container-fluid">
        <h3 class="mt-4">Tag</h3>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Edit Tag</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span><i class="fas fa-edit mr-1"></i>Edit Tag</span>
                <small class="d-sm-block"><a href="{{ route('tag.view') }}" class="btn btn-success btn-sm"><i class="fas fa-list mr-1"></i>Tag List</a></small>
            </div>
            <div class="card-body">
                @include('includes.error')
                <form action="{{ route('tag.update',$editData->id) }}" method="post" id="Myform">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="name">Tag Name</label>
                            <input type="text" class="form-control" value="{{ $editData->name }}" name="name">
                        </div>
                    </div>   
                    <div class="form-row"> 
                        <div class="form-group col-md-6">
                            <label for="description">Description</label>
                            <textarea class="form-control" name="description" placeholder="Enter Some Description">{{ $editData->description }}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Update</button>
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
          }
          
        },
        messages: {
        //   usertype: {
        //     required: "Please Select User Role",
        //   },
        //   name: {
        //     required: "Please Enter Name",
        //   },
        //   email: {
        //     required: "Please enter a email address",
        //     email: "Please enter a vaild email address"
        //   },
        //   password: {
        //     required: "Please Enter password",
        //     minlength: "Your password must be at least 6 characters long"
        //   },
        //   password2: {
        //     required: "Please Enter Confirm password",
        //     equalTo : "Confirm Password Does not Match"
        //   }
          
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