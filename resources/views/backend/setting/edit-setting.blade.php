@extends('layouts.admin')
@section('content')

<main>
    <div class="container-fluid">
        <h3 class="mt-4">Site Setting</h3>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Site Setting</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span><i class="fas fa-plus-circle mr-1"></i>Edit Setting</span>
                {{-- <small class="d-sm-block"><a href="{{ route('post.view') }}" class="btn btn-success btn-sm"><i class="fas fa-list mr-1"></i>Post List</a></small> --}}
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8 m-auto">
                        @include('includes.error')
                        <form action="{{ route('setting.update') }}" method="post" id="Myform" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                              <div class="form-group col-md-8">
                                  <label for="title">Site Logo</label>
                                  <div class="custom-file">
                                    <input type="file" name="file" class="custom-file-input" id="file">
                                    <label class="custom-file-label" for="file">Choose file</label>
                                </div>
                              </div>
                              <div class="form-group col-md-4" id="test">
                                <img class="img-fluid img-thumbnail" src="{{ (!empty($setting->site_logo))?url('upload/logo/'.$setting->site_logo):url('upload/default.jpg') }}" alt="" width="150px" height="150px">
                              </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="name">Setting Name</label>
                                    <input type="text" class="form-control" @if (!empty($setting->name))
                                      value="{{ $setting->name }}"
                                    @endif name="name">
                                </div>
                            </div>  
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="facebook">Facebook</label>
                                    <input type="text" value="{{ $setting->facebook }}" class="form-control" name="facebook" placeholder="Enter facebook Url">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="twitter">Twitter</label>
                                    <input type="text" value="{{ $setting->twitter }}" class="form-control" name="twitter" placeholder="Enter Twitter Url">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="instragram">Instragram</label>
                                    <input type="text" class="form-control" name="instragram" value="{{ $setting->instagram }}" placeholder="Enter Instragram Url">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="reddit">Reddit</label>
                                    <input type="text" value="{{ $setting->reedit }}" class="form-control" name="reddit" placeholder="Enter Reddit Url">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email">Email</label>
                                    <input type="text" value="{{ $setting->email }}" class="form-control" name="email" placeholder="Enter Email">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="copy">Copyright</label>
                                    <input type="text" value="{{ $setting->copyright }}" class="form-control" name="copy" placeholder="copyright &copy; all right reserve">
                                </div>
                            </div>     
                            <div class="form-row"> 
                                <div class="form-group col-md-12">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" name="description" placeholder="Enter Some Description" id="description">{{ $setting->about_site }}</textarea>
                                </div>
                            </div>
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
