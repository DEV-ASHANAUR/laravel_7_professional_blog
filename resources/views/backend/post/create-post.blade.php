@extends('layouts.admin')
@section('content')

<main>
    <div class="container-fluid">
        <h3 class="mt-4">Post</h3>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Create Post</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span><i class="fas fa-plus-circle mr-1"></i>Create Post</span>
                <small class="d-sm-block"><a href="{{ route('post.view') }}" class="btn btn-success btn-sm"><i class="fas fa-list mr-1"></i>Post List</a></small>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-8 m-auto">
                  @include('includes.error')
                <form action="{{ route('post.store') }}" method="post" id="Myform" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                      <div class="form-group col-md-8">
                          <label for="title">Post Image</label>
                          <div class="custom-file">
                            <input type="file" name="image" class="custom-file-input" id="file">
                            <label class="custom-file-label" for="file">Choose file</label>
                        </div>
                      </div>
                      <div class="form-group col-md-4" id="test">
                        
                      </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="title">Post Title</label>
                            <input type="text" class="form-control" name="title">
                        </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-12">
                          <label>Post Category</label>
                          <select name="category" class="form-control" id="category">
                            <option value="">Select Category</option>
                            @foreach ($catagory as $key => $cat)
                             <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                            @endforeach
                          </select>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-12">
                        <label>Post Tag</label><br>
                          @foreach ($tag as $tags)
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" name="tags[]" type="checkbox" id="tag{{ $tags->id }}" value="{{ $tags->id }}">
                              <label class="form-check-label" for="tag{{ $tags->id }}">{{ $tags->name }}</label>
                            </div>
                          @endforeach
                      </div>
                    </div>       
                    <div class="form-row"> 
                        <div class="form-group col-md-12">
                            <label for="description">Description</label>
                            <textarea class="form-control" name="description" placeholder="Enter Some Description" id="description"></textarea>
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
          title: {
            required: true,
          },
          category: {
            required: true,
          },
          image: {
            required: true,
          },
          description: {
            required: true,
          },
          
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