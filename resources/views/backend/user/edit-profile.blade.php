@extends('layouts.admin')
@section('content')

<main>
    <div class="container-fluid">
        <h3 class="mt-4">Edit Profile</h3>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Edit Profile</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span><i class="fas fa-edit mr-1"></i>Edit Profile</span>
                <small class="d-sm-block"><a href="{{ route('profile.view') }}" class="btn btn-success btn-sm"><i class="fas fa-user mr-1"></i>View Profile</a></small>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-8 m-auto">
                  <form action="{{ route('profile.update') }}" method="post" id="Myform" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-12">
                          <label for="name">Name</label>
                          <input type="text" class="form-control" value="{{ $editdata->name }}" name="name" id="name">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                          <label for="email">Email</label>
                          <input type="email" class="form-control" value="{{ $editdata->email }}"  name="email" id="email">
                        </div>
                    </div>
                    <div class="form-row">    
                        <div class="form-group col-md-8">
                          <label for="file" style="background: #1A73E8;padding: 5px 21px;text-transform: uppercase;color: #fff;cursor: pointer;border-radius: 2px;"><i class="fas fa-cloud-upload-alt"></i> change Photo</label>
                          
                          <input type="file" name="file" style="display: none" id="file" />
                        </div>
                          <div class="form-group col-md-4 mt-2" id="test">
                            <img class="img-fluid img-thumbnail" src="{{ (!empty($editdata->image))?url('upload/users_images/'.$editdata->image):url('upload/default.jpg') }}" alt="" width="150px" height="150px">
                          </div>
                    </div>   
                    <div class="form-row">    
                      <div class="form-group col-md-12">
                        <label for="description">User Description</label>
                        <textarea name="description" class="form-control" id="description">{{ $editdata->description }}</textarea>
                      </div>
                    </div> 
                        
                        {{-- <div class="form-group col-md-4">
                            <label for="usertype">User Role</label>
                            <select class="form-control" name="usertype" id="usertype">
                                <option value="">Select Role</option>
                                <option value="Admin" {{ ($editdata->usertype == "Admin")?"selected":"" }}>Admin</option>
                                <option value="User" {{ ($editdata->usertype == "User")?"selected":"" }}>User</option>
                            </select>
                        </div> --}}
          
                    
                      <div class="form-group">
                          <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </form>
                </div>
              </div>
            </div>
        </div>
        
        {{-- previous datatable --}}
    </div>
</main>
<script>
    $(document).ready(function () {
      $('#Myform').validate({
        rules: {
        usertype: {
            required: true,
          },
          name: {
            required: true,
          },
          email: {
            required: true,
            email: true,
          }
        //   password: {
        //     required: true,
        //     minlength: 6
        //   },
        //   password2: {
        //     required: true,
        //     equalTo : '#password'
        //   }
          
        },
        messages: {
          usertype: {
            required: "Please Select User Role",
          },
          name: {
            required: "Please Enter Name",
          },
          email: {
            required: "Please enter a email address",
            email: "Please enter a vaild email address"
          }
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
@section('style')
  <link href="{{ asset('admin') }}/summernote-bs4.css" rel="stylesheet"/>
@endsection
@section('script')
  <script src="{{ asset('admin') }}/summernote-bs4.js"></script>
  <script>
    $('#description').summernote({
        placeholder: 'Write Post Description Here..',
        tabsize: 2,
        height: 300
      });
  </script>
@endsection