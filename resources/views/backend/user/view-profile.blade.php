@extends('layouts.admin')
@section('content')

<main>
    <div class="container-fluid">
        <h3 class="mt-4">Profile</h3>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">view profile</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span><i class="fas fa-user fa-fw mr-1"></i>View Profile</span>
                <small class="d-sm-block"><a href="{{ route('profile.edit') }}" class="btn btn-success btn-sm"><i class="fas fa-edit mr-1"></i> Edit Profile</a></small>
            </div>
            <div class="card-body">
                <section class="section">
                    <div class="section-body">
                      <div class="row mt-sm-4">
                        <div class="col-12 col-md-12 col-lg-4">
                          <div class="card author-box">
                            <div class="card-body">
                              <div class="author-box-center">
                                {{-- <img alt="image" src="{{ asset('public/img') }}/IMG20190314145248.jpg" class="rounded-circle author-box-picture"> --}}
                                <div class="chat_container" style="background-image: url({{ (!empty($user->image))?url('upload/users_images/'.$user->image):url('upload/default.jpg') }});">
                                    <div class="overlay">
                                        
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="author-box-name">
                                  <a href="#">{{ $user->name }}</a>
                                </div>
                                <div class="author-box-job">User</div>
                              </div>
                              <div class="text-center">
                                <div class="author-box-description">
                                  <p>
                                    {!! (!empty($user->description))?$user->description:'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur voluptatum alias molestias
                                    minus quod dignissimos.' !!}
                                  </p>
                                </div>
                                <div class="mb-2 mt-3">
                                  <div class="text-small font-weight-bold">Follow Hasan On</div>
                                </div>
                                <a href="#" class="btn btn-social-icon mr-1 btn-facebook">
                                  <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="#" class="btn btn-social-icon mr-1 btn-twitter">
                                  <i class="fab fa-twitter"></i>
                                </a>
                                <a href="#" class="btn btn-social-icon mr-1 btn-github">
                                  <i class="fab fa-github"></i>
                                </a>
                                <a href="#" class="btn btn-social-icon mr-1 btn-instagram">
                                  <i class="fab fa-instagram"></i>
                                </a>
                                <div class="w-100 d-sm-none"></div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-12 col-md-12 col-lg-8">
                          <div class="card">
                            <div class="card-header">
                                <h4>Personal Details</h4>
                            </div>
                            <div class="card-body">
                                <div class="py-4">
                                <p class="clearfix">
                                    <span class="float-left">
                                    Birthday
                                    </span>
                                    <span class="float-right text-muted">
                                    {{ (!empty($user->dob))?$user->dob:'00-00-0000' }}
                                    </span>
                                </p>
                                <p class="clearfix">
                                    <span class="float-left">
                                    Phone
                                    </span>
                                    <span class="float-right text-muted">
                                        {{ (!empty($user->mobile))?$user->mobile:'(0123)123456789' }}
                                    </span>
                                </p>
                                <p class="clearfix">
                                    <span class="float-left">
                                    Mail
                                    </span>
                                    <span class="float-right text-muted">
                                    {{ $user->email }}
                                    </span>
                                </p>
                                <p class="clearfix">
                                    <span class="float-left">
                                    Address
                                    </span>
                                    <span class="float-right text-muted">
                                        {{ (!empty($user->address))?$user->address:'@Example,@example' }}
                                    </span>
                                </p>
                                {{-- <p class="clearfix">
                                    <span class="float-left">
                                    Twitter
                                    </span>
                                    <span class="float-right text-muted">
                                    <a href="#">@johndeo</a>
                                    </span>
                                </p> --}}
                                </div>
                            </div>
                          </div>
                       </div>
                   </div>
                 </div>
               </section>
            </div>
        </div>
        
        {{-- previous datatable --}}
    </div>
</main>
@endsection 
@section('pstyle')
    <link rel="stylesheet" href="{{ asset('admin/css/components.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/custom.css') }}">
@endsection