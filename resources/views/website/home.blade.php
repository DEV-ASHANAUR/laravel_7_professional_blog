@extends('layouts.website')
@section('content')
<div class="site-section bg-light">
    <div class="container">
      <div class="row align-items-stretch retro-layout-2">
        <div class="col-md-4">
          @foreach ($firstpost as $post)
          <a href="{{ route('website.post',['slug'=>$post->slug]) }}" class="h-entry mb-30 v-height gradient" style="background-image: url('{{ 'upload/posts_photo/'.$post->image }}');">
            
            <div class="text">
              <h2>{{ $post->title }}</h2>
              <span class="date">{{ $post->created_at->format('M d,Y') }}</span>
            </div>
          </a>
          @endforeach
          {{-- <a href="single.html" class="h-entry v-height gradient" style="background-image: url('{{ asset('website') }}/images/img_2.jpg');">
            
            <div class="text">
              <h2>The AI magically removes moving objects from videos.</h2>
              <span class="date">July 19, 2019</span>
            </div>
          </a> --}}
        </div>
        <div class="col-md-4">
          @foreach ($middlepost as $post)
          <a href="{{ route('website.post',['slug'=>$post->slug]) }}" class="h-entry img-5 h-100 gradient" style="background-image: url('{{ 'upload/posts_photo/'.$post->image }}');">
            
            <div class="text">
              <div class="post-categories mb-3">
                <span class="post-category bg-danger">{{ $post->category->name }}</span>
                {{-- <span class="post-category bg-primary">Food</span> --}}
              </div>
              <h2>{{ $post->title }}</h2>
              <span class="date">{{ $post->created_at->format('M d,Y') }}</span>
            </div>
          </a>
          @endforeach
        </div>
        <div class="col-md-4">
          @foreach ($lastpost as $post)
          <a href="{{ route('website.post',['slug'=>$post->slug]) }}" class="h-entry mb-30 v-height gradient" style="background-image: url('{{ 'upload/posts_photo/'.$post->image }}');">
            
            <div class="text">
              <h2>{{ $post->title }}</h2>
              <span class="date">{{ $post->created_at->format('M d,Y') }}</span>
            </div>
          </a>
          @endforeach
          {{-- <a href="single.html" class="h-entry v-height gradient" style="background-image: url('{{ asset('website') }}/images/img_4.jpg');">
            
            <div class="text">
              <h2>The 20 Biggest Fintech Companies In America 2019</h2>
              <span class="date">July 19, 2019</span>
            </div>
          </a> --}}
        </div>
      </div>
    </div>
  </div>

  <div class="site-section">
    <div class="container">
      <div class="row mb-5">
        <div class="col-12">
          <h2>Recent Posts</h2>
        </div>
      </div>
      <div class="row">
        @foreach ($recentPosts as $post)
        <div class="col-lg-4 mb-4">
          <div class="entry2">
            <a href="{{ route('website.post',['slug'=>$post->slug]) }}"><img src="{{ url('upload/posts_photo/'.$post->image) }}" alt="Image" class="img-fluid rounded"></a>
            <div class="excerpt">
            <span class="post-category text-white bg-secondary mb-3">{{ $post->category->name }}</span>

            <h2><a href="{{ route('website.post',['slug'=>$post->slug]) }}">{{ $post->title }}</a></h2>
            <div class="post-meta align-items-center text-left clearfix">
              <figure class="author-figure mb-0 mr-3 float-left"><img src="{{ url('upload/users_images/'.$post->user->image) }}" alt="Image" class="img-fluid"></figure>
              <span class="d-inline-block mt-1">By <a href="{{ route('website.post',['slug'=>$post->slug]) }}">{{ $post->user->name }}</a></span>
              <span>&nbsp;-&nbsp; {{ $post->created_at->format('M d Y') }}</span>
            </div>
            
              <p>@php
                  $fresh = strip_tags($post->description);
              @endphp
              
              {{ Str::limit($fresh, 100, '...') }}</p>
              <p><a href="{{ route('website.post',['slug'=>$post->slug]) }}">Read More</a></p>
            </div>
          </div>
        </div>
        @endforeach
        
        {{-- <div class="col-lg-4 mb-4">
          <div class="entry2">
            <a href="single.html"><img src="{{ asset('website') }}/images/img_2.jpg" alt="Image" class="img-fluid rounded"></a>
            <div class="excerpt">
            <span class="post-category text-white bg-success mb-3">Nature</span>

            <h2><a href="single.html">The AI magically removes moving objects from videos.</a></h2>
            <div class="post-meta align-items-center text-left clearfix">
              <figure class="author-figure mb-0 mr-3 float-left"><img src="{{ asset('website') }}/images/person_1.jpg" alt="Image" class="img-fluid"></figure>
              <span class="d-inline-block mt-1">By <a href="#">Carrol Atkinson</a></span>
              <span>&nbsp;-&nbsp; July 19, 2019</span>
            </div>
            
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt tempora dolor laudantium sed optio, explicabo ad deleniti impedit facilis fugit recusandae! Illo, aliquid, dicta beatae quia porro id est.</p>
              <p><a href="#">Read More</a></p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 mb-4">
          <div class="entry2">
            <a href="single.html"><img src="{{ asset('website') }}/images/img_3.jpg" alt="Image" class="img-fluid rounded"></a>
            <div class="excerpt">
            <span class="post-category text-white bg-warning mb-3">Travel</span>

            <h2><a href="single.html">The AI magically removes moving objects from videos.</a></h2>
            <div class="post-meta align-items-center text-left clearfix">
              <figure class="author-figure mb-0 mr-3 float-left"><img src="{{ asset('website') }}/images/person_1.jpg" alt="Image" class="img-fluid"></figure>
              <span class="d-inline-block mt-1">By <a href="#">Carrol Atkinson</a></span>
              <span>&nbsp;-&nbsp; July 19, 2019</span>
            </div>
            
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt tempora dolor laudantium sed optio, explicabo ad deleniti impedit facilis fugit recusandae! Illo, aliquid, dicta beatae quia porro id est.</p>
              <p><a href="#">Read More</a></p>
            </div>
          </div>
        </div>


        <div class="col-lg-4 mb-4">
          <div class="entry2">
            <a href="single.html"><img src="{{ asset('website') }}/images/img_1.jpg" alt="Image" class="img-fluid rounded"></a>
            <div class="excerpt">
            <span class="post-category text-white bg-secondary mb-3">Politics</span>

            <h2><a href="single.html">The AI magically removes moving objects from videos.</a></h2>
            <div class="post-meta align-items-center text-left clearfix">
              <figure class="author-figure mb-0 mr-3 float-left"><img src="{{ asset('website') }}/images/person_1.jpg" alt="Image" class="img-fluid"></figure>
              <span class="d-inline-block mt-1">By <a href="#">Carrol Atkinson</a></span>
              <span>&nbsp;-&nbsp; July 19, 2019</span>
            </div>
            
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt tempora dolor laudantium sed optio, explicabo ad deleniti impedit facilis fugit recusandae! Illo, aliquid, dicta beatae quia porro id est.</p>
              <p><a href="#">Read More</a></p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 mb-4">
          <div class="entry2">
            <a href="single.html"><img src="{{ asset('website') }}/images/img_2.jpg" alt="Image" class="img-fluid rounded"></a>
            <div class="excerpt">
            <span class="post-category text-white bg-success mb-3">Nature</span>

            <h2><a href="single.html">The AI magically removes moving objects from videos.</a></h2>
            <div class="post-meta align-items-center text-left clearfix">
              <figure class="author-figure mb-0 mr-3 float-left"><img src="{{ asset('website') }}/images/person_1.jpg" alt="Image" class="img-fluid"></figure>
              <span class="d-inline-block mt-1">By <a href="#">Carrol Atkinson</a></span>
              <span>&nbsp;-&nbsp; July 19, 2019</span>
            </div>
            
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt tempora dolor laudantium sed optio, explicabo ad deleniti impedit facilis fugit recusandae! Illo, aliquid, dicta beatae quia porro id est.</p>
              <p><a href="#">Read More</a></p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 mb-4">
          <div class="entry2">
            <a href="single.html"><img src="{{ asset('website') }}/images/img_4.jpg" alt="Image" class="img-fluid rounded"></a>
            <div class="excerpt">
            <span class="post-category text-white bg-danger mb-3">Sports</span>

            <h2><a href="single.html">The AI magically removes moving objects from videos.</a></h2>
            <div class="post-meta align-items-center text-left clearfix">
              <figure class="author-figure mb-0 mr-3 float-left"><img src="{{ asset('website') }}/images/person_1.jpg" alt="Image" class="img-fluid"></figure>
              <span class="d-inline-block mt-1">By <a href="#">Carrol Atkinson</a></span>
              <span>&nbsp;-&nbsp; July 19, 2019</span>
            </div>
            
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt tempora dolor laudantium sed optio, explicabo ad deleniti impedit facilis fugit recusandae! Illo, aliquid, dicta beatae quia porro id est.</p>
              <p><a href="#">Read More</a></p>
            </div>
          </div>
        </div>


        <div class="col-lg-4 mb-4">
          <div class="entry2">
            <a href="single.html"><img src="{{ asset('website') }}/images/img_1.jpg" alt="Image" class="img-fluid rounded"></a>
            <div class="excerpt">
            <span class="post-category text-white bg-success mb-3">Nature</span>

            <h2><a href="single.html">The AI magically removes moving objects from videos.</a></h2>
            <div class="post-meta align-items-center text-left clearfix">
              <figure class="author-figure mb-0 mr-3 float-left"><img src="{{ asset('website') }}/images/person_1.jpg" alt="Image" class="img-fluid"></figure>
              <span class="d-inline-block mt-1">By <a href="#">Carrol Atkinson</a></span>
              <span>&nbsp;-&nbsp; July 19, 2019</span>
            </div>
            
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt tempora dolor laudantium sed optio, explicabo ad deleniti impedit facilis fugit recusandae! Illo, aliquid, dicta beatae quia porro id est.</p>
              <p><a href="#">Read More</a></p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 mb-4">
          <div class="entry2">
            <a href="single.html"><img src="{{ asset('website') }}/images/img_2.jpg" alt="Image" class="img-fluid rounded"></a>
            <div class="excerpt">
            <span class="post-category text-white bg-danger mb-3">Sports</span>
            <span class="post-category text-white bg-secondary mb-3">Tech</span>

            <h2><a href="single.html">The AI magically removes moving objects from videos.</a></h2>
            <div class="post-meta align-items-center text-left clearfix">
              <figure class="author-figure mb-0 mr-3 float-left"><img src="{{ asset('website') }}/images/person_1.jpg" alt="Image" class="img-fluid"></figure>
              <span class="d-inline-block mt-1">By <a href="#">Carrol Atkinson</a></span>
              <span>&nbsp;-&nbsp; July 19, 2019</span>
            </div>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt tempora dolor laudantium sed optio, explicabo ad deleniti impedit facilis fugit recusandae! Illo, aliquid, dicta beatae quia porro id est.</p>
              <p><a href="#">Read More</a></p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 mb-4">
          <div class="entry2">
            <a href="single.html"><img src="{{ asset('website') }}/images/img_4.jpg" alt="Image" class="img-fluid rounded"></a>
            <div class="excerpt">
            <span class="post-category text-white bg-danger mb-3">Sports</span>
            <span class="post-category text-white bg-warning mb-3">Lifestyle</span>

            <h2><a href="single.html">The AI magically removes moving objects from videos.</a></h2>
            <div class="post-meta align-items-center text-left clearfix">
              <figure class="author-figure mb-0 mr-3 float-left"><img src="{{ asset('website') }}/images/person_1.jpg" alt="Image" class="img-fluid"></figure>
              <span class="d-inline-block mt-1">By <a href="#">Carrol Atkinson</a></span>
              <span>&nbsp;-&nbsp; July 19, 2019</span>
            </div>
            
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt tempora dolor laudantium sed optio, explicabo ad deleniti impedit facilis fugit recusandae! Illo, aliquid, dicta beatae quia porro id est.</p>
              <p><a href="#">Read More</a></p>
            </div>
          </div>
        </div> --}}
      </div>
      <div class="row text-center pt-5 border-top">
        
        <div class="col-md-12">
          {{ $recentPosts->links() }}
          {{-- <div class="custom-pagination">
            <span>1</span>
            <a href="#">2</a>
            <a href="#">3</a>
            <a href="#">4</a>
            <span>...</span>
            <a href="#">15</a>
          </div> --}}
        </div>
      </div>
    </div>
  </div>

  <div class="site-section bg-light">
    <div class="container">

      <div class="row align-items-stretch retro-layout">
        
        <div class="col-md-5 order-md-2">
          @foreach ($firstFooterPost as $post)
          <a href="{{ route('website.post',['slug'=>$post->slug]) }}" class="hentry img-1 h-100 gradient" style="background-image: url('{{ 'upload/posts_photo/'.$post->image }}');">
            <span class="post-category text-white bg-danger">{{ $post->category->name }}</span>
            <div class="text">
              <h2>{{ $post->title }}</h2>
              <span>{{ $post->created_at->format('M d,Y') }}</span>
            </div>
          </a>
          @endforeach
        </div>

        <div class="col-md-7">
          @foreach ($lastFooterPost as $post)
          <a href="{{ route('website.post',['slug'=>$post->slug]) }}" class="hentry img-2 v-height mb30 gradient" style="background-image: url('{{ 'upload/posts_photo/'.$post->image }}');">
            <span class="post-category text-white bg-success">{{ $post->category->name }}</span>
            <div class="text text-sm">
              <h2>{{ $post->title }}</h2>
              <span>{{ $post->created_at->format('M d,Y') }}</span>
            </div>
          </a>
          @endforeach
          
          
          <div class="two-col d-block d-md-flex justify-content-between">
            @foreach ($firstfooterPosts2 as $post)
            <a href="{{ route('website.post',['slug'=>$post->slug]) }}" class="hentry v-height img-2 gradient" style="background-image: url('{{ 'upload/posts_photo/'.$post->image }}');">
              <span class="post-category text-white bg-primary">{{ $post->category->name }}</span>
              <div class="text text-sm">
                <h2>{{ $post->title }}</h2>
                <span>{{ $post->created_at->format('M d,Y') }}</span>
              </div>
            </a>
            @endforeach
            
            {{-- <a href="single.html" class="hentry v-height img-2 ml-auto gradient" style="background-image: url('{{ asset('website') }}/images/img_3.jpg');">
              <span class="post-category text-white bg-warning">Lifestyle</span>
              <div class="text text-sm">
                <h2>The 20 Biggest Fintech Companies In America 2019</h2>
                <span>February 12, 2019</span>
              </div>
            </a> --}}
          </div>  
          
        </div>
      </div>

    </div>
  </div>


  <div class="site-section bg-lightx">
    <div class="container">
      <div class="row justify-content-center text-center">
        <div class="col-md-5">
          <div class="subscribe-1 ">
            <h2>Subscribe to our newsletter</h2>
            <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit nesciunt error illum a explicabo, ipsam nostrum.</p>
            <form action="#" class="d-flex">
              <input type="text" class="form-control" placeholder="Enter your email address">
              <input type="submit" class="btn btn-primary" value="Subscribe">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection