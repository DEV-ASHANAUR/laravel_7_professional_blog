@php
    $prefix = Request::route()->getPrefix();
    $route = Route::current()->getName();
@endphp
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
        <link href="{{ asset('admin') }}/css/styles.css" rel="stylesheet" />
        <link href="{{ asset('admin') }}/css/toastr.css" rel="stylesheet">
        <link href="{{ asset('admin') }}/css/datatable.min.css" rel="stylesheet"/>
        <script src="{{ asset('admin') }}/js/fontawesome.min.js"></script>
        <script src="{{ asset('admin') }}/js/jquery.js"></script>
        <script src="{{ asset('admin') }}/js/sweetalert.js"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.html">Start Bootstrap</a><button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button
            ><!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
            <span class="text-white">{{ Auth::user()->name }}</span>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">Settings</a><a class="dropdown-item" href="#">Activity Log</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
							@csrf
						</form>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="{{ route('dashboard') }}"
                                ><div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard</a
                            >
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            {{-- manage category start --}}
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts1" aria-expanded="false" aria-controls="collapseLayouts"
                                ><div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Manage Category
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                            ></a>
                            <div class="collapse {{ ($prefix == '/category')?'show':'' }}" id="collapseLayouts1" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav"><a class="nav-link {{ ($route == 'category.view')?'active':'' }}" href="{{ route('category.view') }}">View Category</a>
                            </div>
                            {{-- manage category end --}}
                            {{-- manage tag start --}}
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts2" aria-expanded="false" aria-controls="collapseLayouts"
                                ><div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Manage Tag
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                            ></a>
                            <div class="collapse {{ ($prefix == '/tag')?'show':'' }}" id="collapseLayouts2" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav"><a class="nav-link {{ ($route == 'tag.view')?'active':'' }}" href="{{ route('tag.view') }}">View Tag</a>
                            </div>
                            {{-- manage tag end --}}
                            {{-- manage tag start --}}
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts3" aria-expanded="false" aria-controls="collapseLayouts"
                                ><div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Manage Post
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                            ></a>
                            <div class="collapse {{ ($prefix == '/post')?'show':'' }}" id="collapseLayouts3" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav"><a class="nav-link {{ ($route == 'post.view')?'active':'' }}" href="{{ route('post.view') }}">View Post</a>
                            </div>
                            {{-- manage tag end --}}
                            
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Start Bootstrap
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">

                @yield('content')

                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2019</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        
        <script src="{{ asset('admin') }}/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('admin') }}/js/scripts.js"></script>
        <script src="{{ asset('admin') }}/js/Chart.min.js"></script>
        <script src="{{ asset('admin') }}/assets/demo/chart-area-demo.js"></script>
        <script src="{{ asset('admin') }}/assets/demo/chart-bar-demo.js"></script>
        <script src="{{ asset('admin') }}/js/dataTables.min.js"></script>
        <script src="{{ asset('admin') }}/js/bootstrap4.min.js"></script>
        <script src="{{ asset('admin') }}/assets/demo/datatables-demo.js"></script>

        <script src="{{ asset('admin') }}/js/toastr.min.js"></script>
        <script src="{{ asset('admin') }}/js/jquery.validate.min.js"></script>
        <script src="{{ asset('admin') }}/js/additional-methods.min.js"></script>
        <script src="{{ asset('admin') }}/js/preview.js"></script>
        <script>
            @if(Session::has('message'))
              var type="{{Session::get('alert-type','info')}}"
              switch(type){
                case 'info':
                      toastr.info("{{ Session::get('message') }}");
                      break;
                case 'success':
                      toastr.success("{{ Session::get('message') }}");
                      break;
                case 'warning':
                      toastr.warning("{{ Session::get('message') }}");
                      break;
                case 'error':
                      toastr.error("{{ Session::get('message') }}");
                      break;
              }
            @endif  
        </script>
        //delete sweetalert
        <script>
            $(document).ready(function(){
              $(document).on('click','#delete',function(e){
                  e.preventDefault();
                  var link = $(this).attr('href');
                  Swal.fire({
                      title: 'Are you sure?',
                      text: "You won't be able to revert this!",
                      icon: 'warning',
                      showCancelButton: true,
                      confirmButtonColor: '#3085d6',
                      cancelButtonColor: '#d33',
                      confirmButtonText: 'Yes, delete it!'
                      }).then((result) => {
                      if (result.value) {
                          window.location.href = link;
                          Swal.fire(
                          'Deleted!',
                          'Your file has been deleted.',
                          'success'
                          )
                      }
                   });
              });
            });
        </script>
    </body>
</html>
